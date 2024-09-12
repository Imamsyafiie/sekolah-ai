<?php

namespace App\Filament\Widgets;

use App\Models\KontenPembelajaran;
use App\Models\Nilai;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Total Users
            Stat::make('Total Pengguna', User::count())
                ->description('Total jumlah pengguna yang terdaftar')
                ->color('primary'),

            // Active Users (assuming you have an 'is_active' column)
            Stat::make('Pengguna Aktif', User::where('active_status', true)->count())
                ->description('Pengguna yang aktif di chat saat ini')
                ->color('success'),
            Stat::make('Total Siswa', User::role('siswa')->count()) // 'siswa' adalah nama role
                ->description('Jumlah total siswa yang terdaftar')
                ->color('primary'),
            Stat::make('Total Guru', User::role('guru')->count()) // 'siswa' adalah nama role
                ->description('Jumlah total guru yang terdaftar')
                ->color('primary'),
            Stat::make('Total Materi Pembelajaran', KontenPembelajaran::count())
                ->description('Total jumlah pembelajaran')
                ->color('primary'),
            Stat::make('Total Tugas Siswa', Nilai::count())
                ->description('Total jumlah siswa yang menyetorkan tugas')
                ->color('primary'),

        ];
    }
    // protected static function getGridColumns(): int
    // {
    //     return 3; // Mengatur tampilan menjadi 3 kolom
    // }
}
