<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustryResource\Pages;
use App\Models\Industry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class IndustryResource extends Resource
{
    protected static ?string $model = Industry::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) // form dibagi 2 kolom
                    ->schema([
                        // foto industry/logo
                        Forms\Components\FileUpload::make('picture')
                            ->label("Industry Logo")
                            ->image()
                            ->directory('industry')
                            ->columnSpan(2)
                            ->required(),

                        // nama industry
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->placeholder("Industry Name")
                            ->required(),

                        // bidang usaha
                        Forms\Components\TextInput::make('industry_sector')
                            ->label('Industry Sector')
                            ->placeholder('Industry Sector')
                            ->required(),

                        // website industry
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->placeholder('Website Industry')
                            ->url()
                            ->required(),

                        // email industry
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Email Industry')
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->validationMessages([
                                'unique' => 'Email ini sudah terdaftar',
                            ])
                            ->required(),

                        // kontak industry
                        Forms\Components\TextInput::make('contact')
                            ->label('Contact')
                            ->placeholder('Industry Contact')
                            ->required(),

                        // alamat industry
                        Forms\Components\TextInput::make('address')
                            ->label('Address')
                            ->placeholder('Industry Address')
                            ->columnSpan(2)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Nomor urut berdasarkan ID
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) => Industry::orderBy('id')->pluck('id')->search($record->id) + 1),

                // Logo industry
                Tables\Columns\ImageColumn::make('picture')
                    ->label('Logo'),

                // Nama industry
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                // Bidang usaha
                Tables\Columns\TextColumn::make('industry_sector')
                    ->label('Industry Sector')
                    ->searchable()
                    ->sortable(),

                // Website industry (tampilkan sebagai link)
                Tables\Columns\TextColumn::make('website')
                    ->label('Website')
                    ->url(fn ($record) => $record->website, true)
                    ->openUrlInNewTab()
                    ->searchable()
                    ->sortable(),

                // Email industry
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                // Kontak industry
                Tables\Columns\TextColumn::make('contact')
                    ->label('Contact')
                    ->searchable()
                    ->sortable(),

                //address
                Tables\Columns\TextColumn::make('address')
                    ->label('Address')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter jika perlu
            ])
            ->actions([
               \Filament\Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                    ->action(function ($record) { // ini hapus per item
                        static::deleteIndustry($record);
                    })
                ]),
            ])
            ->bulkActions([
    Tables\Actions\DeleteBulkAction::make()
        ->label('Delete Selected')
        ->before(function ($records, $action) {
            foreach ($records as $record) {
                // Misalnya, industri masih aktif digunakan di laporan PKL
                if ($record->pkls()->exists()) {
                    \Filament\Notifications\Notification::make()
                        ->title('Failed to delete')
                        ->body("Industry {$record->name} is still use in PKL data.")
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
                        ->body("Industry {$record->name} could not be deleted due to database constraints.")
                        ->danger()
                        ->send();

                    $action->cancel();
                    return;
                }
            }
        }),
    ]);

    }

    protected static function deleteIndustry($record){
        if($record->pkls()->exists()){
            \Filament\Notifications\Notification::make()
                ->title('Gagal menghapus industri')
                ->body('Industri ini masih digunakan untuk PKL')
                ->danger()
                ->send();
            return false;
        }

        $record->delete();
        \Filament\Notifications\Notification::make()
            ->title('Berhasil menghapus industri')
            ->body('Industri berhasil dihapus')
            ->success()
            ->send();

        return true;
    }

    public static function getRelations(): array
    {
        return [
            // Definisikan relation managers jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListIndustries::route('/'),
            'create' => Pages\CreateIndustry::route('/create'),
            'view'   => Pages\ViewIndustry::route('/{record}'),
            'edit'   => Pages\EditIndustry::route('/{record}/edit'),
        ];
    }
}
