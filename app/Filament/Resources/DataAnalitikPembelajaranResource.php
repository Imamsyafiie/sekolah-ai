<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataAnalitikPembelajaranResource\Pages;
use App\Filament\Resources\DataAnalitikPembelajaranResource\RelationManagers;
use App\Models\DataAnalitikPembelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataAnalitikPembelajaranResource extends Resource
{
    protected static ?string $model = DataAnalitikPembelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';
    protected static ?string $navigationGroup = 'Menagement Pembelajaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Pengguna')
                    ->relationship('user', 'name') // Relasi dengan tabel User
                    ->required()
                    ->preload(),

                Forms\Components\TextInput::make('metrik_kinerja')
                    ->label('Metrik Kinerja')
                    ->placeholder('Misalnya, skor rata-rata, tingkat penyelesaian tugas')
                    ->required(),

                Forms\Components\TextInput::make('pola_belajar')
                    ->label('Pola Belajar')
                    ->placeholder('Misalnya, preferensi jenis konten, waktu belajar optimal')
                    ->required(),

                Forms\Components\Textarea::make('data_tambahan')
                    ->label('Data Tambahan')
                    ->placeholder('Misalnya, pola atau catatan khusus lainnya')
                    ->nullable(),
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
                    ->label('Pengguna'),
                Tables\Columns\TextColumn::make('metrik_kinerja')
                    ->label('Metrik Kinerja'),
                Tables\Columns\TextColumn::make('pola_belajar')
                    ->label('Pola Belajar'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime(),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListDataAnalitikPembelajarans::route('/'),
            'create' => Pages\CreateDataAnalitikPembelajaran::route('/create'),
            'edit' => Pages\EditDataAnalitikPembelajaran::route('/{record}/edit'),
        ];
    }
}
