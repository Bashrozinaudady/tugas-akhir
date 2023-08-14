<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sisadmin = User::create([
            'name' => 'sistem admin',
            'email' => 'sistemadmin@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        $staf = User::create([
            'name' => 'staf',
            'email' => 'staf@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        Role::create(['name' => 'sistem admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staf']);

        $sisadmin->assignRole('sistem admin');
        $admin->assignRole('admin');
        $staf->assignRole('staf');
    }
}
