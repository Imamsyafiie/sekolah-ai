<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AIResponseResource\Pages;
use App\Filament\Resources\AIResponseResource\RelationManagers;
use App\Models\AIResponse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use OpenAI\Laravel\Facades\OpenAI;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AIResponseResource extends Resource
{
    protected static ?string $model = AIResponse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('prompt')
                    ->label('Prompt')
                    ->withAI()
                    ->required(),

                Forms\Components\Textarea::make('response')
                    ->label('Response')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('prompt')
                    ->label('Prompt')
                    ->limit(50),

                Tables\Columns\TextColumn::make('response')
                    ->label('Response')
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAIResponses::route('/'),
            'create' => Pages\CreateAIResponse::route('/create'),
            'edit' => Pages\EditAIResponse::route('/{record}/edit'),
        ];
    }
}
