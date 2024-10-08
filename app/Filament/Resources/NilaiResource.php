<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiResource\Pages;
use App\Filament\Resources\NilaiResource\RelationManagers;
use App\Models\Nilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Closure;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static ?string $navigationGroup = 'Menagement Pembelajaran';
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $recordTitleAttribute = 'siswa.name';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required(),

                Forms\Components\Select::make('siswa_id')
                    ->label('Nama Siswa')
                    ->relationship('siswa', 'name', function ($query) {
                        $query->whereHas('roles', function ($q) {
                            $q->where('name', 'siswa'); // Asumsikan role name untuk siswa adalah 'siswa'
                        });
                    })
                    ->required()
                    ->preload(),

                Forms\Components\TextInput::make('nilai')
                    ->label('Nilai')
                    ->numeric()
                    ->rules(['min:0', 'max:100'])
                    ->required(fn($record) => $record !== null)
                    ->disabled(fn($record) => $record === null), // Disabled saat create

                Forms\Components\Textarea::make('feedback')
                    ->label('Feedback')
                    ->withAI()
                    ->required(fn($record) => $record !== null)
                    ->disabled(fn($record) => $record === null),

                Forms\Components\FileUpload::make('file_tugas')
                    ->label('Upload Tugas')
                    ->directory('tugas_files')
                    ->maxSize(50000)
                    ->nullable(),
                Forms\Components\TextInput::make('text')
                    ->label('Link YouTube')
                    ->required()
                    ->maxLength(300),
                Forms\Components\Select::make('tema')
                    ->label('Tema Proyek Nusantara')
                    ->required()
                    ->options([
                        'Seni Budaya Nusantara' => 'Seni Budaya Nusantara',
                        'Kuliner Khas Nusantara' => 'Kuliner Khas Nusantara',
                        'Tokoh Lokal Nusantara' => 'Tokoh Lokal Nusantara',
                        'Busana Tradisional Nusantara' => 'Busana Tradisional Nusantara',
                    ])
                    ->placeholder('Pilih tema proyek'),
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
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    Tables\Columns\ImageColumn::make('siswa.avatar_url')
                        ->label('Avatar')
                        ->circular(),
                    Tables\Columns\TextColumn::make('siswa.name')
                        ->label('Siswa')
                        ->icon('heroicon-m-user-circle')
                        ->sortable()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('judul')
                        ->label('Judul Project')
                        ->icon('heroicon-m-academic-cap')
                        ->sortable()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('nilai')
                        ->label('Nilai')
                        ->icon('heroicon-m-clipboard-document-check')
                        ->sortable()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('tema')
                        ->label('Tema Proyek Nusantara')
                        // ->icon('heroicon-m-clipboard-document-check')
                        // ->sortable()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('text')
                        ->label('Link YouTube')
                        ->formatStateUsing(fn($state) => '<a href="' . $state . '" target="_blank">' . $state . '</a>')
                        ->html(), // Pastikan untuk mengizinkan HTML
                    Tables\Columns\TextColumn::make('file_tugas')
                        ->label('File Tugas')
                        ->url(fn($record) => $record->file_tugas ? Storage::url($record->file_tugas) : null)
                        ->openUrlInNewTab() // Membuka file tugas di tab baru
                        ->searchable(),
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
            'index' => Pages\ListNilais::route('/'),
            // 'create' => Pages\CreateNilai::route('/create'),
            // 'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
