<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PklResource\Pages;
use App\Filament\Resources\PklResource\RelationManagers;
use App\Models\Pkl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationLabel = 'PKL Data';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        //siswa_id
                        Forms\Components\Select::make('student_id')
                            ->label('Student Name')
                            ->relationship('student', 'name')
                            ->native(false)
                            ->columnSpan(2)
                            ->unique(table: 'pkls', column: 'student_id', ignoreRecord: true)
                            ->validationMessages([
                                'unique' => 'This student already has PKL data',
                            ])
                            ->required(),
                        
                        //industri_id
                        Forms\Components\Select::make('industry_id')
                            ->label('Industry Name')
                            ->relationship('industry', 'name')
                            ->native(false)
                            ->required(),
                        
                        //guru_id
                        Forms\Components\Select::make('teacher_id')
                            ->label('Teacher Name')
                            ->relationship('teacher', 'name')
                            ->native(false)
                            ->required(),
                        
                        //mulai
                        Forms\Components\DatePicker::make('start')
                            ->label('Start Date')
                            ->maxDate(now ()->addYears(5)) //input maksimal tgl hanya 5 tahun dari hari ini
                            ->required(),
                        
                        //selesai
                        Forms\Components\DatePicker::make('end')
                            ->label('End Date')
                            ->maxDate(now ()->addYears(5))
                            ->after('start')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) => pkl::orderBy('id')->pluck('id')
                    ->search($record->id) + 1),

                //nama siswa
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student Name')
                    ->searchable(),
                
                //nama industri
                Tables\Columns\TextColumn::make('industry.name')
                    ->label('Industry Name')
                    ->searchable(),

                //nama guru
                Tables\Columns\TextColumn::make('teacher.name')
                    ->label('Teacher Name')
                    ->searchable(),
                
                //mulai
                Tables\Columns\TextColumn::make('start')
                    ->label('Start')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y')),

                //selesai
                Tables\Columns\TextColumn::make('end')
                    ->label('End')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y')),
                
                //durasi
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration')
                    ->getStateUsing(fn ($record) => 
                        \Carbon\Carbon::parse($record->start)->diffInDays(\Carbon\Carbon::parse($record->end)) . ' days'
                    ),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Delete selected'),
            ]);
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
            'index' => Pages\ListPkls::route('/'),
            'create' => Pages\CreatePkl::route('/create'),
            'view' => Pages\ViewPkl::route('/{record}'),
            'edit' => Pages\EditPkl::route('/{record}/edit'),
        ];
    }
}
