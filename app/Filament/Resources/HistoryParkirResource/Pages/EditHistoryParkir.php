<?php

namespace App\Filament\Resources\HistoryParkirResource\Pages;

use App\Filament\Resources\HistoryParkirResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistoryParkir extends EditRecord
{
    protected static string $resource = HistoryParkirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
