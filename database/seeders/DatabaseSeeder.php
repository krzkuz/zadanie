<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(30)
            ->create();

        $articles = Article::factory()
            ->count(200)
            ->create();

        foreach($articles as $article) {
            $randomInt = rand(1,3);
            //get random number of authors
            $authors = User::inRandomOrder()
                ->limit($randomInt)
                ->get();
                
            //attach those random users as authors of current loop iteration article
            foreach($authors as $author) {
                $author->articles()->attach($article->id);
            }
        }
    }
}
