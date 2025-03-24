<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        DB::table('properties')->insert([
            [
                'name' => 'Villa en bord de mer',
                'description' => 'Magnifique villa avec vue sur la mer, idéale pour des vacances en famille.',
                'price_per_night' => 250.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Appartement en centre-ville',
                'description' => 'Appartement moderne situé au cœur de la ville, proche de toutes commodités.',
                'price_per_night' => 120.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chalet en montagne',
                'description' => 'Chalet chaleureux en pleine montagne, parfait pour un séjour au calme.',
                'price_per_night' => 180.00,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
