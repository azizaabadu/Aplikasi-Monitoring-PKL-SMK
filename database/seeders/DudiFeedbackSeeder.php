<?php

namespace Database\Seeders;

use App\Models\DudiFeedback;
use Illuminate\Database\Seeder;

class DudiFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DudiFeedback::factory()->count(10)->create();
    }
}
