<?php

namespace App\Filament\Resources\DataAnalitikPembelajaranResource\Pages;

use App\Filament\Resources\DataAnalitikPembelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataAnalitikPembelajaran extends EditRecord
{
    protected static string $resource = DataAnalitikPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
