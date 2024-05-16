<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Agus Somantri',
            'phone' => '+628575214',
            'email' => 'somantriagus@gmail.com',
            'address' => 'Bandung, Jawa Barat',
            'bio' => 'IT Dev',
            'role' => 'superadmin',
            'email_verified_at' => now(),
            'password' => Hash::make('Rahasia123#'),
        ]);

        User::create([
            'name' => 'Lecturer',
            'phone' => '+628575214',
            'email' => 'lecturer@gmail.com',
            'address' => 'Indonesia',
            'bio' => 'Lecturer',
            'role' => 'lecturer',
            'email_verified_at' => now(),
            'password' => Hash::make('lecturer123#'),
        ]);
    }
}
