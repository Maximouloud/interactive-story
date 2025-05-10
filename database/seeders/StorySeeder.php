<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;

class StorySeeder extends Seeder
{
    public function run(): void
    {
        Story::create([
            'title' => 'L’aventure du chevalier perdu',
            'description' => 'Une épopée où chaque décision compte.',
        ]);

        Story::create([
            'title' => 'Mystère dans la forêt sombre',
            'description' => 'Un récit d’horreur et de suspense.',
        ]);
    }
}
