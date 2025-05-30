<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationLabel = 'SIJA Students';
    protected static ?string $pluralLabel = 'List Student';

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        //nama
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->placeholder('Student Name')
                            ->required(),
                        
                        //nis
                        Forms\Components\TextInput::make('nis')
                            ->label('NIS')
                            ->placeholder('Student NIS')
                            ->unique(ignoreRecord: true)
                            ->validationMessages([
                                'unique' => 'NIS is already registered',
                            ])
                            ->required(),
                        
                        //gender
                        Forms\Components\Select::make('gender')
                            ->label('Gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                            ])
                            ->native(False)
                            ->required(),
                        
                        //rombel
                        Forms\Components\Select::make('class_group')
                            ->label('Class Group')
                            ->options([
                                'SIJA A' => 'SIJA A',
                                'SIJA B' => 'SIJA B',
                            ])
                            ->native(False)
                            ->required(),
                        
                        //email
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Student Email')
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->validationMessages([
                                'unique' => 'Email is already registered',
                            ])
                            ->required(),
                        
                        //kontak
                        Forms\Components\TextInput::make('contact')
                            ->label('Contact')
                            ->placeholder('Student Contact')
                            ->required(),
                        
                        //alamat
                        Forms\Components\TextInput::make('address')
                            ->label('Address')
                            ->placeholder('Student Address')
                            ->columnSpan(2)
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //nomor urut dari terkecil ke terbesar
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) => student::orderBy('id')->pluck('id')
                    ->search($record->id) + 1),    

                //nama
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                
                //nis
                Tables\Columns\TextColumn::make('nis')
                ->label('NIS')
                ->searchable()
                ->sortable(),

                //gender
                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->searchable()
                    ->sortable(),

                //rombel
                Tables\Columns\TextColumn::make('class_group')
                    ->label('Class Group')
                    ->searchable()
                    ->sortable(),
                
                //email
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                
                //kontak
                Tables\Columns\TextColumn::make('contact')
                    ->label('Contact')
                    ->url(fn ($record) => 'https://wa.me/' . preg_replace('/[^0-9]/', '', $record->contact))
                    ->openUrlInNewTab()
                    ->searchable()
                    ->sortable(),
                
                //status PKL
                Tables\Columns\BadgeColumn::make('pkl_report_status')
                    ->label('PKL Report Status')
                    ->formatStateUsing(fn ($state) => $state ? 'Aktif' : 'Tidak Aktif') //ubah nilai boolean jadi teks
                    ->color(fn ($state) => $state ? 'success' : 'danger'), //memberi warna badge, success jika aktif, danger jika inactive
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('gender')
                    ->label('Gender')
                    ->options([
                        'Male' => 'Male',
                        'Female' => 'Female',
                    ]),
                Tables\Filters\SelectFilter::make('class_group')
                    ->label('Class Group')
                    ->options([
                        'SIJA A' => 'SIJA A',
                        'SIJA B' => 'SIJA B',
                    ]),
                Tables\Filters\TernaryFilter::make('pkl_report_status')
                    ->trueLabel('Active')
                    ->falseLabel('Non-active'),
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                        ->before(function ($record, $action) {
                            if ($record->pkl_report_status) {
                                \Filament\Notifications\Notification::make()
                                    ->title('Failed to delete')
                                    ->body("Student {$record->name} are still active in PKL.")
                                    ->danger()
                                    ->send();

                                $action->cancel(); // Hentikan proses hapus tanpa error
                            }
                        }),
                ]),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Delete Selected')
                        ->before(function ($records, $action) {
                            foreach ($records as $record) {
                                if (isset($record->student) && $record->student->pkl_report_status) {
                                    \Filament\Notifications\Notification::make()
                                        ->title('Failed to delete')
                                        ->body("Student {$record->name} are still active in PKL.")
                                        ->danger()
                                        ->send();

                                    $action->cancel(); // Batalkan aksi hapus tanpa melempar exception
                                    return;
                                }

                                try {
                                    $record->delete();
                                } catch (\Illuminate\Database\QueryException $e) {
                                    \Filament\Notifications\Notification::make()
                                        ->title('Failed to delete')
                                        ->body('Student data cannot be deleted because still active in PKL.')
                                        ->danger()
                                        ->send();

                                    $action->cancel(); // Batalkan aksi hapus
                                    return;
                                }
                            }
                        }),
                    ]);
            // ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'view' => Pages\ViewStudent::route('/{record}'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
