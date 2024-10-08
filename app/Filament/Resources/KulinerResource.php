<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KulinerResource\Pages;
use App\Filament\Resources\KulinerResource\RelationManagers;
use App\Models\Kuliner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use NaturalGroove\Filament\ImageGeneratorField\Forms\Components\ImageGenerator;

class KulinerResource extends Resource
{
    protected static ?string $model = Kuliner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Menagement Kuliner';
    protected static ?string $navigationLabel = 'Produk Nusantara';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\FileUpload::make('image')
                //     ->image(),
                ImageGenerator::make('image')
                    ->imageEditor()
                    ->directory('blog'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp. '),
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
                    ->required()
                    ->maxLength(65535)
                    ->hint('Translatable')
                    ->hintColor('primary')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('published_at'),
                Forms\Components\TextInput::make('nomor_hp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Nama Publiser')
                    // ->multiple()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'title')
                    ->label('Category')
                    // ->multiple()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('alamat')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->numeric()
                    ->prefix('Rp. '),
                // Tables\Columns\TextColumn::make('published_at')
                //     ->date()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('nomor_hp')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('user.name')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('category.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListKuliners::route('/'),
            'create' => Pages\CreateKuliner::route('/create'),
            'edit' => Pages\EditKuliner::route('/{record}/edit'),
        ];
    }
}
