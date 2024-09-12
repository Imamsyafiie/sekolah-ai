<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\DataAnalitikPembelajaranResource;
use App\Models\DataAnalitikPembelajaran as ModelsDataAnalitikPembelajaran;
use Filament\Tables;
// use App\Models\DataAnalitikPembelajaran;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class VataAnalitikPembelajaran extends BaseWidget
{
    // protected ?string $heading = 'Data Analitik Pembelajaran';
    protected static ?string $heading = 'Data Analitik Pembelajaran';
    protected int | string | array $columnSpan = 3;
    public function table(Table $table): Table
    {
        return $table
            ->query(DataAnalitikPembelajaranResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('user.avatar_url')
                    ->label('Avatar')
                    ->circular(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('metrik_kinerja')
                    ->label('Metrik Kinerja'),
                Tables\Columns\TextColumn::make('pola_belajar')
                    ->label('Pola Belajar'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime(),
            ]);
        // ->columnSpan('full');
    }
}
