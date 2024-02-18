<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Mechanic;
use Illuminate\Database\Seeder;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mechanic::factory(25)
            ->has(Car::factory()->count(3))
            ->create();
    }
}
