<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use \NaturalGroove\Filament\ImageGeneratorField\Forms\Components\ImageGenerator;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Proyek';
    protected static ?string $navigationGroup = 'Menagement Web';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nilai_id')
                    ->label('Judul')
                    ->relationship('nilai', 'judul') // Relasi dengan tabel User
                    ->required()
                    ->preload(),
                // Forms\Components\TextInput::make('title')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\FileUpload::make('image')
                //     ->directory('blog')
                //     ->image(),
                ImageGenerator::make('image')
                    ->imageEditor()
                    ->directory('blog'),
                Forms\Components\DatePicker::make('publish_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('nilai.tema')
                    ->label('Tema')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai.judul')
                    ->label('Judul')
                    ->sortable(),
                // Tables\Columns\TextColumn::make('publish_date')
                //     ->date()
                //     ->sortable(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
