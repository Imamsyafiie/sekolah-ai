<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AktivitasPembelajaranResource\Pages;
use App\Filament\Resources\AktivitasPembelajaranResource\RelationManagers;
use App\Models\AktivitasPembelajaran;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Support\Facades\Storage;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AktivitasPembelajaranResource extends Resource
{
    protected static ?string $model = AktivitasPembelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Menagement Pembelajaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('konten_pembelajaran_id')
                    ->label('Judul')
                    ->relationship('kontenpembelajaran', 'judul')
                    ->preload()
                    ->searchable()
                    ->required(),
                // Forms\Components\Select::make('konten_pembelajaran_id')
                //     ->label('Deskripsi')
                //     ->relationship('kontenPembelajaran', 'deskripsi')
                //     ->preload()
                //     ->getOptionLabelUsing(fn($deskripsi) => \Illuminate\Support\Str::limit($deskripsi, 50)) // Membatasi panjang teks deskripsi
                //     ->required(),
                Forms\Components\Select::make('jenis_aktivitas')
                    ->options([
                        'Kuis' => 'Kuis',
                        'Tugas' => 'Tugas',
                        'Proyek' => 'Proyek',
                    ])
                    ->required(),
                Forms\Components\Select::make('konten_pembelajaran_id')
                    ->label('Tingkat Kelas')
                    ->relationship('kontenPembelajaran', 'tingkat_kelas')
                    ->required(),
                Forms\Components\Select::make('konten_pembelajaran_id')
                    ->label('Konten Pembelajaran')
                    ->relationship('kontenPembelajaran', 'file_path')
                    ->required(),
                Forms\Components\DatePicker::make('batas_pengumpulan')
                    ->required(),
                Forms\Components\TextInput::make('bobot_penilaian')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Stack::make([
                Tables\Columns\ImageColumn::make('kontenpembelajaran.user.avatar_url')
                    ->label('Avatar')
                    ->circular(),
                Tables\Columns\TextColumn::make('kontenpembelajaran.judul')
                    ->label('Judul & Bobot Penilaian')
                    ->searchable()
                    ->description(fn(AktivitasPembelajaran $record): string => $record->bobot_penilaian)
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_aktivitas')
                    ->label('Jenis Aktivitas & Batas Waktu')
                    ->description(fn(AktivitasPembelajaran $record): string => $record->batas_pengumpulan),
                // Tables\Columns\TextColumn::make('batas_pengumpulan')
                //     ->date()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('bobot_penilaian')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('kontenpembelajaran.file_path')
                    ->label('Content')
                    ->formatStateUsing(fn($state) => $state ? "<a href='" . Storage::url($state) . "' target='_blank'>Lihat Content</a>" : 'Tidak ada file')
                    ->html()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // ]),
            ])
            ->defaultSort('created_at', 'desc')
            // ->contentGrid([
            //     'md' => 2,
            //     'xl' => 3,
            // ])
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
            'index' => Pages\ListAktivitasPembelajarans::route('/'),
            // 'create' => Pages\CreateAktivitasPembelajaran::route('/create'),
            // 'edit' => Pages\EditAktivitasPembelajaran::route('/{record}/edit'),
        ];
    }
}
