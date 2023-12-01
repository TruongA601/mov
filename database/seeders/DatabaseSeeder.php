<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => '$2y$10$7xJe3x4hxllnBkic6Hhz3O6lWqxtdtT4vys33o/HPoIDC0A.7dqWW',
            'role' => '1',
            'phone' => '0918205423',
        ]);
    }
}
