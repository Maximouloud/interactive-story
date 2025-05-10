<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Choice;

class ChoiceSeeder extends Seeder
{
    public function run(): void
    {
        // Choix pour chapitre 1, histoire 1
        Choice::create([
            'chapter_id' => 1,
            'text' => 'Avancer sur le sentier',
            'next_chapter_id' => 2,
        ]);

        Choice::create([
            'chapter_id' => 1,
            'text' => 'Rester sur place',
            'next_chapter_id' => null, // pas encore défini
        ]);

        // Choix pour chapitre 1, histoire 2
        Choice::create([
            'chapter_id' => 3,
            'text' => 'Fuir vers le village',
            'next_chapter_id' => null,
        ]);

        Choice::create([
            'chapter_id' => 3,
            'text' => 'Explorer le bruit',
            'next_chapter_id' => null,
        ]);
    }
}
