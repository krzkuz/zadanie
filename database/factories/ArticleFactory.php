<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomDays = rand(0, 30);

        //get random date between 30 days ago and now
        $randomDate = Carbon::now()->subDays($randomDays);

        return [
            'title' => fake()->text(50),
            'text' => fake()->text(),
            'created_at' => $randomDate,
            'updated_at' => $randomDate
        ];
    }
}
