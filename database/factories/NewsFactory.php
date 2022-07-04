<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'image' => 'new-img.jpg',
            'date' => $this->faker->date('Y-m-d'),
            'text' => $this->faker->text(),
            'link' => $this->faker->url(),
            'user_id' => rand(1,2),
            'publish' => 1,
        ];
    }
}
