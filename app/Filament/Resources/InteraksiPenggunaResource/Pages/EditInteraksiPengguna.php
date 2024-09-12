<?php

namespace App\Filament\Resources\InteraksiPenggunaResource\Pages;

use App\Filament\Resources\InteraksiPenggunaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInteraksiPengguna extends EditRecord
{
    protected static string $resource = InteraksiPenggunaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
