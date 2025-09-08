<?php

namespace Database\Seeders;

use App\Repositories\UserRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(UserRepository::class)->create([
            'name' => 'Admin user',
            'email' => 'admin@email.com',
            'password' => 'admin123',
            'email_verified_at' => now()
        ]);
    }
}
