<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontenPembelajaranResource\Pages;
use App\Filament\Resources\KontenPembelajaranResource\RelationManagers;
use Filament\Tables\Actions\ActionGroup;
use App\Models\KontenPembelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\Layout\Stack;

// use Illuminate\Container\Attributes\Storage;
// use Hugomyb\FilamentMediaAction\Actions\MediaAction as ActionsMediaAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class KontenPembelajaranResource extends Resource
{
    protected static ?string $model = KontenPembelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Menagement Pembelajaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Nama Guru')
                    ->relationship('user', 'name')
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('deskripsi')
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
                    ->label('Deskripsi')
                    ->required(),
                Forms\Components\Select::make('jenis_konten')
                    ->label('Jenis Konten')
                    ->options([
                        'PDF' => 'PDF',
                        'Gambar' => 'Gambar',
                        'Video' => 'Video',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('mata_pelajaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tingkat_kelas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('file_path')
                    ->directory('konten_files')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('user.avatar_url')
                    ->label('Avatar')
                    ->circular(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Guru')
                    ->searchable()
                    ->description(fn(KontenPembelajaran $record): string => $record->judul)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mata_pelajaran')
                    ->searchable()
                    ->description(fn(KontenPembelajaran $record): string => $record->jenis_konten)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tingkat_kelas'),
                // Tables\Columns\TextColumn::make('deskripsi')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->label('Bahan Pembelajaran')
                    ->formatStateUsing(fn($state) => $state ? "<a href='" . Storage::url($state) . "' target='_blank'>Lihat Pembelajaran</a>" : 'Tidak ada file')
                    ->html()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListKontenPembelajarans::route('/'),
            // 'create' => Pages\CreateKontenPembelajaran::route('/create'),
            // 'edit' => Pages\EditKontenPembelajaran::route('/{record}/edit'),
        ];
    }
}
