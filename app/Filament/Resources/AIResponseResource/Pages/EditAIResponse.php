<?php

namespace App\Filament\Resources\AIResponseResource\Pages;

use App\Filament\Resources\AIResponseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAIResponse extends EditRecord
{
    protected static string $resource = AIResponseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
