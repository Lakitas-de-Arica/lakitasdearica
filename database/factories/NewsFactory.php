<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\New\NewService;

class NewsFactory extends Factory
{
    protected $newService;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        $this->newService = new NewService();

        return [
            'title' => $title,
            'slug' => $this->newService->generateSlug($title),
            'image' => 'news/new.jpg',
            'date' => $this->faker->date('Y-m-d'),
            'introduction' => $this->paragraphs(2),
            'text' => $this->paragraphs(5),
            'link' => $this->faker->url(),
            'created_user_id' => rand(1,2),
            'publish' => 1,
        ];
    }

    public function paragraphs($n)
    {
        return implode('<br>',$this->faker->paragraphs(5));
    }
}
