<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $roleDosen = Role::create(['name' => 'dosen']);
        $roleMahasiswa = Role::create(['name' => 'mahasiswa']);

        // Menambahkan permissions (contoh)
        $permissionEditPosts = Permission::create(['name' => 'edit_posts']);
        $permissionDeletePosts = Permission::create(['name' => 'delete_posts']);

        // Menambahkan permissions ke roles (contoh)
        $roleDosen->givePermissionTo([$permissionEditPosts, $permissionDeletePosts]);
        // $roleMahasiswa->givePermissionTo($permissionEditPosts); // Contoh: memberikan permission ke role mahasiswa jika diperlukan

        // Menetapkan role ke user (contoh)
        $userDosen = User::where('email', 'dosen@example.com')->first();
        if ($userDosen) {
            $userDosen->assignRole($roleDosen);
        }

        $userMahasiswa = User::where('email', 'mahasiswa@example.com')->first();
        if ($userMahasiswa) {
            $userMahasiswa->assignRole($roleMahasiswa);
        }
    }
}
