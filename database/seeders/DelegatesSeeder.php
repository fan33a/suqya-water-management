<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DelegatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing institution owners
        $institution1 = User::where('email', 'ahmed@institution1.com')->first();
        $institution2 = User::where('email', 'fatima@institution2.com')->first();

        if ($institution1) {
            // Create delegates for Institution 1
            User::firstOrCreate(
                ['email' => 'ahmed.delegate1@institution1.com'],
                [
                    'name' => 'أحمد الشريف',
                    'password' => Hash::make('password'),
                    'role' => 'representative',
                    'phone' => '0591234567',
                    'city' => 'الرياض',
                    'institution_id' => $institution1->id,
                    'status' => 'active',
                ]
            );

            User::firstOrCreate(
                ['email' => 'sara.delegate1@institution1.com'],
                [
                    'name' => 'سارة العلي',
                    'password' => Hash::make('password'),
                    'role' => 'representative',
                    'phone' => '0569876543',
                    'city' => 'الرياض',
                    'institution_id' => $institution1->id,
                    'status' => 'inactive',
                ]
            );
        }

        if ($institution2) {
            // Create delegates for Institution 2
            User::firstOrCreate(
                ['email' => 'mahmoud.delegate2@institution2.com'],
                [
                    'name' => 'محمود حسن',
                    'password' => Hash::make('password'),
                    'role' => 'representative',
                    'phone' => '0597654321',
                    'city' => 'جدة',
                    'institution_id' => $institution2->id,
                    'status' => 'active',
                ]
            );
        }
    }
} 