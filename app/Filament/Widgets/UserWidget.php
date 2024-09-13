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
            // Total Pengguna
            Stat::make('Total Pengguna', User::count())
                ->description('Jumlah total pengguna yang terdaftar')
                ->descriptionIcon('heroicon-o-users') // Ikon pengguna
                ->color('primary')
                ->chart([15, 25, 30, 45, 50]) // Chart mini untuk visualisasi data
                ->chartColor('blue'),

            // Pengguna Aktif
            Stat::make('Pengguna Aktif', User::where('active_status', true)->count())
                ->description('Pengguna yang aktif di chat saat ini')
                // ->descriptionIcon('heroicon-o-status-online') // Ikon status aktif
                ->color('success')
                ->chart([10, 20, 30, 40, 45])
                ->chartColor('green'),

            // Total Siswa
            Stat::make('Total Siswa', User::role('siswa')->count()) // 'siswa' adalah nama role
                ->description('Jumlah total siswa yang terdaftar')
                ->descriptionIcon('heroicon-o-academic-cap') // Ikon siswa
                ->color('blue')
                ->chart([12, 18, 20, 35, 40])
                ->chartColor('indigo'),

            // Total Guru
            Stat::make('Total Guru', User::role('guru')->count()) // 'guru' adalah nama role
                ->description('Jumlah total guru yang terdaftar')
                ->descriptionIcon('heroicon-o-briefcase') // Ikon guru
                ->color('amber')
                ->chart([8, 10, 12, 15, 20])
                ->chartColor('yellow'),

            // Total Materi Pembelajaran
            Stat::make('Total Materi Pembelajaran', KontenPembelajaran::count())
                ->description('Total materi yang tersedia')
                ->descriptionIcon('heroicon-o-book-open') // Ikon buku
                ->color('purple')
                ->chart([5, 7, 10, 20, 25])
                ->chartColor('purple'),

            // Total Tugas Siswa
            Stat::make('Total Tugas Siswa', Nilai::count())
                ->description('Jumlah tugas yang disetorkan oleh siswa')
                ->descriptionIcon('heroicon-o-check-circle') // Ikon tugas
                ->color('pink')
                ->chart([10, 15, 20, 25, 30])
                ->chartColor('pink'),

        ];
    }
    // protected static function getGridColumns(): int
    // {
    //     return 3; // Mengatur tampilan menjadi 3 kolom
    // }
}
