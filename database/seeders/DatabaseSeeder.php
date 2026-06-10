<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);

        $user = User::factory()->create([
            'name' => 'Abdullah',
            'email' => 'abdullah@gmail.com',
            'password' => Hash::make('Abdullah#146'),
        ]);
        $user->assignRole('student');

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@secure-study.com',
            'password' => Hash::make('Admin#123'),
        ]);
        $admin->assignRole('course_admin');
    }
}
