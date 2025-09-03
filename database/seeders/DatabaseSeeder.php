<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario de prueba generado con factory
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Llamada a otros seeders
        $this->call([
            UserSeeder::class,
            EquipmentSeeder::class,
        ]);
    }
}
