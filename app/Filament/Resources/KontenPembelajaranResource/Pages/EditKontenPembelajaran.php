<?php

namespace App\Filament\Resources\KontenPembelajaranResource\Pages;

use App\Filament\Resources\KontenPembelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKontenPembelajaran extends EditRecord
{
    protected static string $resource = KontenPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
