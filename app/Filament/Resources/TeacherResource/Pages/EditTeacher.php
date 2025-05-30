<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use App\Filament\Resources\TeacherResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditTeacher extends EditRecord
{
    protected static string $resource = TeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function ($record, \Filament\Actions\DeleteAction $action) {
                    if ($record->pkl()->exists()) {
                        \Filament\Notifications\Notification::make()
                            ->title('Gagal menghapus!')
                            ->body('Guru ini masih digunakan dalam PKL. Hapus PKL terkait terlebih dahulu.')
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
