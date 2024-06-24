<?php

namespace App\Filament\Resources\ParkirMahasiswaResource\Pages;

use App\Filament\Resources\ParkirMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParkirMahasiswa extends EditRecord
{
    protected static string $resource = ParkirMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
