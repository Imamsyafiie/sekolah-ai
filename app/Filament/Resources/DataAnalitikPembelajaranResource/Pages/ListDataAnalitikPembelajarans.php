<?php

namespace App\Filament\Resources\DataAnalitikPembelajaranResource\Pages;

use App\Filament\Resources\DataAnalitikPembelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataAnalitikPembelajarans extends ListRecords
{
    protected static string $resource = DataAnalitikPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
