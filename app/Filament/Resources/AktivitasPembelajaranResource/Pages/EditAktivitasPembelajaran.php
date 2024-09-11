<?php

namespace App\Filament\Resources\AktivitasPembelajaranResource\Pages;

use App\Filament\Resources\AktivitasPembelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAktivitasPembelajaran extends EditRecord
{
    protected static string $resource = AktivitasPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
