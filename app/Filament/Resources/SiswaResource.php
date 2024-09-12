<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Menagement Guru & Siswa ';
    protected static ?string $navigationLabel = 'Data Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Nama Siswa')
                    ->multiple()
                    ->preload()
                    ->required(),
                // ->disabled(), // Assuming you don't want to edit the user name directly here
                Forms\Components\TextInput::make('kelas')
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
                    Tables\Columns\TextColumn::make('user.name')
                        ->description(fn($record): string => $record->user->roles->pluck('name')->implode(', '))
                        ->searchable()
                        ->label('Nama Siswa')
                        ->sortable(),
                    Tables\Columns\TextColumn::make('user.email')
                        ->label('Email')
                        ->sortable(),
                    // Tables\Columns\TextColumn::make('user.roles.name')
                    //     ->label('Status')
                    //     ->searchable(),
                    Tables\Columns\TextColumn::make('kelas'),
                ]),
            ])
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
