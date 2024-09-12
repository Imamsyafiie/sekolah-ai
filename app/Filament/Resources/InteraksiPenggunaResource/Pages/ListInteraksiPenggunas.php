<?php

namespace App\Filament\Resources\InteraksiPenggunaResource\Pages;

use App\Filament\Resources\InteraksiPenggunaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInteraksiPenggunas extends ListRecords
{
    protected static string $resource = InteraksiPenggunaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
