<?php

namespace App\Filament\Resources\KartuMahasiswaResource\Pages;

use App\Filament\Resources\KartuMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKartuMahasiswa extends CreateRecord
{
    protected static string $resource = KartuMahasiswaResource::class;

    protected static bool $canCreateAnother = false;


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
