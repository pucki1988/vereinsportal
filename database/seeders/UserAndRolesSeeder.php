<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role; // Falls du spatie/laravel-permission nutzt
use Illuminate\Support\Facades\Hash;

class UserAndRolesSeeder extends Seeder
{
    public function run()
    {
        // Rollen anlegen
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'manager']);

        // User anlegen
        $user = User::updateOrCreate(
            ['email' => 'aschuster.development@outlook.de'],
            [
                'name' => 'Andreas Schuster',
                'password' => Hash::make('12345678'),
            ]
        );

        // Rolle zuweisen
        $user->assignRole('admin');
    }
}