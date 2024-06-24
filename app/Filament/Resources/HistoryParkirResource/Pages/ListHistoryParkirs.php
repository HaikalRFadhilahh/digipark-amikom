<?php

namespace App\Filament\Resources\HistoryParkirResource\Pages;

use App\Filament\Resources\HistoryParkirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoryParkirs extends ListRecords
{
    protected static string $resource = HistoryParkirResource::class;

    public function getTitle(): string
    {
        return 'Data History Parkir Mahasiswa';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
