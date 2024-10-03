<?php

namespace App\Filament\Resources\KearifanResource\Pages;

use App\Filament\Resources\KearifanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKearifan extends EditRecord
{
    protected static string $resource = KearifanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
