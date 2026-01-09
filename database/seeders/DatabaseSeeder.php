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

        // Seed sample FAQs
        \App\Models\Faq::updateOrCreate(
            ['question' => 'Is the quality of roaming services abroad the same as in my country?'],
            [
                'answer' => 'When our roaming services are available, the quality of the service in that country could be different from that in your country, due to varying local coverage, available speed, available latency, and agreements with local providers.',
                'order' => 1,
            ]
        );

        \App\Models\Faq::updateOrCreate(
            ['question' => 'Do I lose my number by using Particle?'],
            [
                'answer' => 'No, your Particle eSIM works alongside your existing SIM card while you\'re abroad. You\'re still going to be able to receive 2FA codes, texts or calls with your own SIM. You just use ours with data you preload.',
                'order' => 2,
            ]
        );
    }
}
