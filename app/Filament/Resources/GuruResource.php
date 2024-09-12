<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Menagement Guru & Siswa ';
    protected static ?string $navigationLabel = 'Data Guru';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Nama Guru')
                    ->multiple()
                    ->preload()
                    ->required(),
                // ->disabled(), // Assuming you don't want to edit the user name directly here
                Forms\Components\TextInput::make('mata_pembelajaran')
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
                        ->icon('heroicon-m-user-circle')
                        ->label('Nama Guru')
                        ->searchable()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('user.email')
                        ->label('Email')
                        ->icon('heroicon-m-envelope')
                        ->sortable(),
                    // Tables\Columns\TextColumn::make('user.roles.name')
                    //     ->label('Status')
                    //     ->searchable(),
                    Tables\Columns\TextColumn::make('mata_pembelajaran')
                        ->icon('heroicon-m-book-open'),
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
