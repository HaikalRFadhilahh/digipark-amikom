<?php

namespace App\Filament\Resources\KartuMahasiswaResource\Pages;

use App\Filament\Resources\KartuMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKartuMahasiswas extends ListRecords
{
    protected static string $resource = KartuMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Kartu Mahasiswa')->color('info'),
        ];
    }

    public function getTitle(): string
    {
        return 'Data Kartu Mahasiswa';
    }



}
