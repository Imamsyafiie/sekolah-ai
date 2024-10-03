<?php

namespace App\Filament\Resources;

// namespace App\Filament\Resources;


// namespace BezhanSalleh\FilamentShield\Resources;

// use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

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
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Menagement Guru & Siswa ';
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $recordTitleAttribute = 'user.name';
    // public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    // {
    //     return $record->name;
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Nama Siswa')
                    // ->multiple()
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
                        ->icon('heroicon-m-user-circle')
                        ->label('Nama Siswa')
                        ->sortable(),
                    Tables\Columns\TextColumn::make('user.email')
                        ->label('Email')
                        ->icon('heroicon-m-envelope')
                        ->sortable(),
                    // Tables\Columns\TextColumn::make('user.roles.name')
                    //     ->label('Status')
                    //     ->searchable(),
                    Tables\Columns\TextColumn::make('kelas')
                        ->icon('heroicon-m-building-library'),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
    // public static function getPermissionPrefixes(): array
    // {
    //     return [
    //         'view',
    //         'view_any',
    //         'create',
    //         'update',
    //         'delete',
    //         'delete_any',
    //         // 'publish'
    //     ];
    // }
}
