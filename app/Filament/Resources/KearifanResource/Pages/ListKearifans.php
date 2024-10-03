<?php

namespace App\Filament\Resources\KearifanResource\Pages;

use App\Filament\Resources\KearifanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKearifans extends ListRecords
{
    protected static string $resource = KearifanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
