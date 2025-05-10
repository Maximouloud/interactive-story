<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\Choice;

class StorySeeder extends Seeder
{
    public function run(): void
    {
        $story = Story::create([
            'title' => 'Les chemins du reflet',
            'description' => 'Une exploration intérieure déguisée en voyage européen. Chaque décision révèle une facette enfouie.'
        ]);

        $chapter1 = Chapter::create([
            'story_id' => $story->id,
            'content' => "Tu arrives à Venise, fatigué·e, l’âme lourde. Un canal t'invite à la dérive, mais une voix intérieure t'appelle vers une ruelle bruyante.",
        ]);
    
        $chapter2 = Chapter::create([
            'story_id' => $story->id,
            'content' => "Dans la ruelle, un homme te propose de l'accompagner vers un théâtre caché. Il prétend que le spectacle pourrait te transformer.",
        ]);
    
        $chapter3 = Chapter::create([
            'story_id' => $story->id,
            'content' => "Sur la gondole, tu observes le silence et la lenteur. Une vieille femme te tend un miroir en murmurant : 'As-tu déjà vraiment regardé ?'",
        ]);
    
        $chapter4 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Le théâtre est désert. Tu entends des voix derrière le rideau. Une main sort et te tend un masque : comédie ou tragédie ?',
        ]);
    
        $chapter5 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Le miroir montre des souvenirs. Tu vois un ancien amour, un choix abandonné. Tu peux briser le miroir ou t’y plonger encore.',
        ]);
    
        $chapter6 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Tu choisis la comédie. Le public t’acclame. Tu improvises, mais chaque rire te sonne faux. Un inconnu t’attend dans les coulisses.',
        ]);
    
        $chapter7 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Tu choisis la tragédie. Les larmes du public te transpercent. Tu sors épuisé·e, et croises une vieille amie perdue de vue.',
        ]);
    
        $chapter8 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Tu brises le miroir. Les morceaux forment une carte. Elle mène à un village dont tu n’as jamais entendu parler.',
        ]);
    
        $chapter9 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Tu t’y plonges. Tu revis un été à Rome. Un souvenir refait surface : une lettre jamais envoyée.',
        ]);
    
        $chapter10 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Dans le village, tu rencontres un peintre qui a arrêté de créer. Il te propose un marché : peins à sa place ou l’écoute-le.',
        ]);
    
        $chapter11 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Avec l’amie retrouvée, vous marchez sans parler. Elle t’emmène dans une maison abandonnée qui appartenait à ta famille.',
        ]);
    
        $chapter12 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Tu lis la lettre oubliée. Elle était destinée à toi-même. Tu peux y répondre ou la brûler.',
        ]);
    
        $chapter13 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Tu peins, et les tableaux dévoilent ce que tu refuses d’admettre. Le peintre disparaît, et tu restes face à l’œuvre.',
        ]);
    
        $chapter14 = Chapter::create([
            'story_id' => $story->id,
            'content' => "Tu brûles la lettre. Une page noire apparaît sous les cendres, avec une phrase : 'Reviens au point de départ.'",
        ]);
    
        $chapter15 = Chapter::create([
            'story_id' => $story->id,
            'content' => 'Tu réponds à la lettre. Tu pleures. Le vent la porte loin. Tu souris enfin, comprenant que certains mots n’étaient là que pour être entendus par le silence.',
        ]);
    
        Choice::create([
            'chapter_id' => $chapter1->id,
            'text' => 'Suivre la voix dans la ruelle',
            'next_chapter_id' => $chapter2->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter1->id,
            'text' => 'Monter dans une gondole',
            'next_chapter_id' => $chapter3->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter2->id,
            'text' => "Suivre l'homme au théâtre",
            'next_chapter_id' => $chapter4->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter3->id,
            'text' => 'Accepter le miroir',
            'next_chapter_id' => $chapter5->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter4->id,
            'text' => 'Choisir le masque de comédie',
            'next_chapter_id' => $chapter6->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter4->id,
            'text' => 'Choisir le masque de tragédie',
            'next_chapter_id' => $chapter7->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter5->id,
            'text' => 'Briser le miroir',
            'next_chapter_id' => $chapter8->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter5->id,
            'text' => 'Regarder encore',
            'next_chapter_id' => $chapter9->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter6->id,
            'text' => 'Parler à l’inconnu',
            'next_chapter_id' => $chapter10->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter7->id,
            'text' => 'Suivre ton amie',
            'next_chapter_id' => $chapter11->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter9->id,
            'text' => 'Lire la lettre',
            'next_chapter_id' => $chapter12->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter8->id,
            'text' => 'Suivre la carte vers le village',
            'next_chapter_id' => $chapter10->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter10->id,
            'text' => 'Peindre à sa place',
            'next_chapter_id' => $chapter13->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter10->id,
            'text' => 'Juste écouter son histoire',
            'next_chapter_id' => $chapter14->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter11->id,
            'text' => 'Explorer la maison',
            'next_chapter_id' => $chapter12->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter12->id,
            'text' => 'Répondre à la lettre',
            'next_chapter_id' => $chapter15->id,
        ]);
    
        Choice::create([
            'chapter_id' => $chapter12->id,
            'text' => 'La brûler',
            'next_chapter_id' => $chapter14->id,
        ]);
    
    }
}
