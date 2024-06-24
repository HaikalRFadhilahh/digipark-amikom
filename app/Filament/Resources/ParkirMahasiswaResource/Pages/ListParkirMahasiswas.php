<?php

namespace App\Filament\Resources\ParkirMahasiswaResource\Pages;

use App\Filament\Resources\ParkirMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParkirMahasiswas extends ListRecords
{
    protected static string $resource = ParkirMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return 'Data Daftar Parkir Mahasiswa';
    }
}
