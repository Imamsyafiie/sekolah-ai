<?php

namespace App\Filament\Resources\KontenPembelajaranResource\Pages;

use App\Filament\Resources\KontenPembelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKontenPembelajarans extends ListRecords
{
    protected static string $resource = KontenPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
