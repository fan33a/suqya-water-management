<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WaterRequest;
use App\Models\User;

class WaterRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get delegates
        $delegate1 = User::where('email', 'ahmed.delegate1@institution1.com')->first();
        $delegate2 = User::where('email', 'sara.delegate1@institution1.com')->first();
        $delegate3 = User::where('email', 'mahmoud.delegate2@institution2.com')->first();

        // Get institution owners as users
        $user1 = User::where('email', 'ahmed@institution1.com')->first();
        $user2 = User::where('email', 'fatima@institution2.com')->first();

        if ($delegate1 && $user1) {
            // Create water requests for delegate 1
            for ($i = 1; $i <= 24; $i++) {
                WaterRequest::create([
                    'user_id' => $user1->id,
                    'representative_id' => $delegate1->id,
                    'type' => rand(0, 1) ? 'point' : 'tanker',
                    'emergency' => rand(0, 1),
                    'quantity' => rand(100, 1000),
                    'status' => ['pending', 'approved', 'completed', 'cancelled'][rand(0, 3)],
                    'scheduled_time' => now()->addDays(rand(1, 30)),
                ]);
            }
        }

        if ($delegate2 && $user1) {
            // Create water requests for delegate 2
            for ($i = 1; $i <= 10; $i++) {
                WaterRequest::create([
                    'user_id' => $user1->id,
                    'representative_id' => $delegate2->id,
                    'type' => rand(0, 1) ? 'point' : 'tanker',
                    'emergency' => rand(0, 1),
                    'quantity' => rand(100, 1000),
                    'status' => ['pending', 'approved', 'completed', 'cancelled'][rand(0, 3)],
                    'scheduled_time' => now()->addDays(rand(1, 30)),
                ]);
            }
        }

        if ($delegate3 && $user2) {
            // Create water requests for delegate 3
            for ($i = 1; $i <= 15; $i++) {
                WaterRequest::create([
                    'user_id' => $user2->id,
                    'representative_id' => $delegate3->id,
                    'type' => rand(0, 1) ? 'point' : 'tanker',
                    'emergency' => rand(0, 1),
                    'quantity' => rand(100, 1000),
                    'status' => ['pending', 'approved', 'completed', 'cancelled'][rand(0, 3)],
                    'scheduled_time' => now()->addDays(rand(1, 30)),
                ]);
            }
        }
    }
} 