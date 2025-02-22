<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DifficultySeeder::class,
            LevelSeeder::class,
            FormSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            UserAnswerSeeder::class,
            // Otros seeders
        ]);
    }
}
