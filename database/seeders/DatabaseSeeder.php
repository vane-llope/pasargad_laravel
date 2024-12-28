<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Mine;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Stone;
use App\Models\StoneType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Stone::factory(10)->create();
        // StoneType::factory(4)->create();
        // Article::factory(10)->create();
        // Mine::factory(10)->create();
        // Project::factory(10)->create();
        // ProjectType::factory(2)->create();
        User::factory()->create([
            'name' => 'Zahra',
            'email' => 'zahraaa.syi@gmail.com',
            'password' => '123456',
        ]);

    }
}
