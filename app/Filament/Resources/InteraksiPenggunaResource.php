<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InteraksiPenggunaResource\Pages;
use App\Filament\Resources\InteraksiPenggunaResource\RelationManagers;
use App\Models\InteraksiPengguna;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InteraksiPenggunaResource extends Resource
{
    protected static ?string $model = InteraksiPengguna::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';
    protected static ?string $navigationGroup = 'Menagement Guru & Siswa ';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Pengguna')
                    ->relationship('user', 'name')
                    ->preload()
                    ->required()
                    ->preload(),
                Forms\Components\Select::make('aktivitas_pembelajaran_id')
                    ->label('Interaksi Konten')
                    ->relationship('aktivitasPembelajaran.kontenpembelajaran', 'jenis_konten') // pastikan 'nilai' adalah nama kolom di tabel 'nilai'
                    ->required()
                    ->nullable()
                    ->preload(),
                // Select Aktivitas Pembelajaran
                Forms\Components\Select::make('aktivitas_pembelajaran_id')
                    ->label('Aktivitas Pembelajaran')
                    ->relationship('aktivitasPembelajaran.kontenpembelajaran', 'judul')
                    ->nullable() // Nullable karena tidak selalu ada aktivitas terkait
                    ->preload(),
                // Jenis Interaksi
                Forms\Components\Select::make('jenis_interaksi')
                    ->label('Jenis Interaksi')
                    ->options([
                        'Melihat' => 'Melihat',
                        'Mengunduh' => 'Mengunduh',
                        'Menyelesaikan' => 'Menyelesaikan',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->required(),

                // Data Tambahan
                Forms\Components\Textarea::make('data_tambahan')
                    ->label('Data Tambahan')
                    ->placeholder('Misalnya, jawaban kuis atau menonton video')
                    ->nullable(),

                // Waktu Interaksi (Optional: Bisa diisi otomatis atau manual)
                Forms\Components\DateTimePicker::make('waktu_interaksi')
                    ->label('Waktu Interaksi')
                    ->default(now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    Tables\Columns\ImageColumn::make('user.avatar_url')
                        ->label('Avatar')
                        ->circular(),
                    // Pengguna
                    Tables\Columns\TextColumn::make('user.name')
                        ->label('Pengguna')
                        ->sortable()
                        ->searchable(),

                    // Interaksi Konten

                    // Aktivitas Pembelajaran
                    Tables\Columns\TextColumn::make('aktivitasPembelajaran.kontenpembelajaran.judul')
                        ->label('Aktivitas Pembelajaran')
                        ->sortable()
                        ->searchable(),

                    // Jenis Interaksi
                    Tables\Columns\TextColumn::make('jenis_interaksi')
                        ->label('Jenis Interaksi')
                        ->sortable()
                        ->searchable(),

                    Tables\Columns\TextColumn::make('aktivitasPembelajaran.kontenpembelajaran.jenis_konten') // Ganti dengan kolom yang sesuai
                        ->label('Interaksi Konten')
                        ->sortable()
                        ->searchable(),
                    // Data Tambahan
                    Tables\Columns\TextColumn::make('data_tambahan')
                        ->label('Data Tambahan')
                        ->sortable()
                        ->searchable(),

                    // Waktu Interaksi
                    Tables\Columns\TextColumn::make('waktu_interaksi')
                        ->label('Waktu Interaksi')
                        ->sortable()
                        ->searchable()
                        ->dateTime(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
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
            'index' => Pages\ListInteraksiPenggunas::route('/'),
            'create' => Pages\CreateInteraksiPengguna::route('/create'),
            'edit' => Pages\EditInteraksiPengguna::route('/{record}/edit'),
        ];
    }
}
