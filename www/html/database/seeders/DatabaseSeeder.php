<?php

namespace Database\Seeders;

use App\Models\CH4;
use App\Models\CO;
use App\Models\Indications;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CH4::factory()->count(100)->create();
        //CO::truncate();
        //IndicationsController::factory()->count(10)->create();
        //CO::factory()->count(10)->create();
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
