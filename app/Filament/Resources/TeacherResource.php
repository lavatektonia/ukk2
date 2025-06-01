<?php

namespace App\Filament\Resources;

use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationLabel = 'SIJA Teachers';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->placeholder("Teacher's Name")
                    ->required(),

                Forms\Components\TextInput::make('nip')
                    ->label('NIP')
                    ->placeholder("Teacher's NIP")
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'NIP is already registered',
                    ])
                    ->required(),

                Forms\Components\Select::make('gender')
                    ->label('Gender')
                    ->options([
                        'M' => 'Male',
                        'F' => 'Female',
                    ])
                    ->native(false)
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->placeholder("Teacher's Email")
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'Email is already registered',
                    ])
                    ->required(),

                Forms\Components\Select::make('contact_type')
                    ->label('Contact Type')
                    ->options([
                        'whatsapp' => 'WhatsApp',
                        'telegram' => 'Telegram',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('contact_value')
                    ->label('Contact Value')
                    ->placeholder('Masukkan nomor WA atau ID Telegram')
                    ->required(),

                Forms\Components\TextInput::make('address')
                    ->label('Address')
                    ->placeholder("Teacher's address")
                    ->columnSpan(2)
                    ->required(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) =>
                        Teacher::orderBy('id')->pluck('id')->search($record->id) + 1
                    ),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => $state === 'M' ? 'Male' : 'Female')
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('contact_type')
                    ->label('Contact Type')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->sortable(),

                Tables\Columns\TextColumn::make('contact_value')
                    ->label('Contact Value')
                    ->url(fn ($record) => match ($record->contact_type) {
                        'whatsapp' => 'https://wa.me/' . preg_replace('/[^0-9]/', '', $record->contact_value),
                        'telegram' => 'https://t.me/' . preg_replace('/^@/', '', $record->contact_value),
                        default => null,
                    })
                    ->openUrlInNewTab()
                    ->sortable()
                    ->wrap(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Delete Selected')
                    ->before(function ($records, $action) {
                        foreach ($records as $record) {
                            if ($record->teacher && $record->teacher->pkl_report_status) {
                                \Filament\Notifications\Notification::make()
                                    ->title('Failed to delete')
                                    ->body("The supervising teacher of student {$record->name} is still active in PKL.")
                                    ->danger()
                                    ->send();

                                $action->cancel();
                                return;
                            }

                            try {
                                $record->delete();
                            } catch (\Illuminate\Database\QueryException $e) {
                                \Filament\Notifications\Notification::make()
                                    ->title('Failed to delete')
                                    ->body("Teacher data {$record->name} cannot be deleted because it is still active in PKL.")
                                    ->danger()
                                    ->send();

                                $action->cancel();
                                return;
                            }
                        }
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relation managers jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'view'   => Pages\ViewTeacher::route('/{record}'),
            'edit'   => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
