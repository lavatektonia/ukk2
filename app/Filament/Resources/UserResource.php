<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        //nama
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->placeholder('Name')
                            ->required(),
                        
                        //email
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Email')
                            ->email()
                            ->required(),

                        //email created
                        Forms\Components\DateTimePicker::make('created_at')
                            ->label('Email is created')
                            ->placeholder('Email is created')
                            ->default(now()) //waktu saat data dibuat
                            ->disabled(), //input tidak bisa diedit
                        
                        //sandi
                        Forms\Components\TextInput::make('password')
                            ->label('Password')
                            ->placeholder("Leave blank if you don't want to change")
                            ->password()
                            ->dehydrateStateUsing(fn($state) =>($state) ? bcrypt($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord),
                        
                        //roles
                        Forms\Components\Select::make('roles')
                            ->label('Roles')
                            ->relationship('roles', 'name')
                            ->multiple() //pemilihan lebih dari 1 opsi
                            ->columnSpan(2) //melebar ke 2 kolom dalam grid layout
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
                    ->getStateUsing(fn ($record) => user::orderBy('id')->pluck('id')
                    ->search($record->id) + 1),
                
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->datetime()
                    ->searchable(),
            
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Roles')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
