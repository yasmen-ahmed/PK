<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as FakerFactory;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = FakerFactory::create();

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'role' => $faker->randomElement(['admin', 'user']),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'),
            ]);
        }
}

}
