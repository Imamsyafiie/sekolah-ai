<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KearifanResource\Pages;
use App\Filament\Resources\KearifanResource\RelationManagers;
use App\Models\Kearifan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KearifanResource extends Resource
{
    protected static ?string $model = Kearifan::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static ?string $navigationGroup = 'Menagement Web';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->label('Link YouTube')
                    ->required(),
                Forms\Components\TextArea::make('description')
                    ->label('Text')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Judul')
                    ->limit(20),
                Tables\Columns\TextColumn::make('link')
                    ->label('Link'),
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
            'index' => Pages\ListKearifans::route('/'),
            'create' => Pages\CreateKearifan::route('/create'),
            'edit' => Pages\EditKearifan::route('/{record}/edit'),
        ];
    }
}
