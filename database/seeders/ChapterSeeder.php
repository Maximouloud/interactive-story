<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class ChapterSeeder extends Seeder
{
    public function run(): void
    {
        // Chapitre 1 pour histoire 1
        Chapter::create([
            'story_id' => 1,
            'content' => 'Vous vous réveillez dans une forêt mystérieuse. Que faites-vous ?',
        ]);

        // Chapitre 2 pour histoire 1
        Chapter::create([
            'story_id' => 1,
            'content' => 'Vous avancez prudemment sur le sentier...',
        ]);

        // Chapitre 1 pour histoire 2
        Chapter::create([
            'story_id' => 2,
            'content' => 'Un hurlement résonne dans la nuit. Vous êtes seul.',
        ]);
    }
}
