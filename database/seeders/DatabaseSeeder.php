<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'admin',
                'password' => bcrypt('Password!321'),
                'isAdmin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@ehb.be'],
            [
                'name' => 'user',
                'password' => bcrypt('Password!321'),
                'isAdmin' => false,
            ]
        );

        Hero::updateOrCreate(
            ['id' => 1],
            [
                'image' => '/Assets/heroImage.jpg',
                'buttonText' => 'Shop plans now',
                'buttonLink' => '/countries',
                'textLine1' => 'Stay connected with your family this holiday season',
                'textLine2' => 'Plans starting at €3.99',
            ]
        );
    }
}
