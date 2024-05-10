<?php

namespace Database\Seeders\CreationBriefProjet;

use App\Models\CreationBriefProjet\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resource::create([
            'nom' => 'HTML Basics',
            'description' => 'Introduction to HTML',
            'lien' => 'https://www.w3schools.com/html/',
            'nature' => 'resource',
            'brief_projet_id' => 1,
        ]);

        Resource::create([
            'nom' => 'CSS Flexbox Guide',
            'description' => 'Complete Guide to Flexbox',
            'lien' => 'https://css-tricks.com/snippets/css/a-guide-to-flexbox/',
            'nature' => 'reference',
            'brief_projet_id' => 1,
        ]);    }
}
