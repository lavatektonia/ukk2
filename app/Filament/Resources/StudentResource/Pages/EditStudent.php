<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudent extends EditRecord
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function ($record, \Filament\Actions\DeleteAction $action) {
                    if ($record->pkls()->exists()) {
                        \Filament\Notifications\Notification::make()
                            ->title('Failed to delete.')
                            ->body('Student is still active in PKL.')
                            ->danger()
                            ->send();

                        $action->halt(); // hentikan eksekusi tanpa error
                    }
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
