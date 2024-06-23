<?php

namespace App\Filament\Resources\KartuMahasiswaResource\Pages;

use App\Filament\Resources\KartuMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKartuMahasiswa extends EditRecord
{
    protected static string $resource = KartuMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
