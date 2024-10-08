<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemaResource\Pages;
use App\Filament\Resources\TemaResource\RelationManagers;
use App\Models\Tema;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use NaturalGroove\Filament\ImageGeneratorField\Forms\Components\ImageGenerator;

class TemaResource extends Resource
{
    protected static ?string $model = Tema::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?string $navigationGroup = 'Menagement Web';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('link')
                    ->label('Link YouTube')
                    ->required()
                    ->maxLength(255),
                ImageGenerator::make('gambar')
                    ->label('Gambar')
                    ->imageEditor()
                    ->directory('tema'),
                // Forms\Components\FileUpload::make('gambar')
                //     ->label('Gambar')
                //     ->required()
                //     ->directory('tema'),
                Forms\Components\RichEditor::make('text')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->label('Text')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar'),
                // ->url(fn(Tema $record) => Storage::url($record->gambar)),
                Tables\Columns\TextColumn::make('judul')->label('Judul'),
                // Tables\Columns\TextColumn::make('text')->label('Teks'),
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
            'index' => Pages\ListTemas::route('/'),
            'create' => Pages\CreateTema::route('/create'),
            'edit' => Pages\EditTema::route('/{record}/edit'),
        ];
    }
}
