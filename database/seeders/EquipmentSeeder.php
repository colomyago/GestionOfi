<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment; // 👈 Importa el modelo correcto

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipment::create([
            'name' => 'Laptop Dell',
            'type' => 'Computadora',
            'stock' => 10,
        ]);
    }
}
