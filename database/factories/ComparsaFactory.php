<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\Comparsa\ComparsaService;

class ComparsaFactory extends Factory
{
    protected $comparsaService;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();
        $this->comparsaService = new ComparsaService();

        return [
            'name'            => $name,
            'slug'            => $this->comparsaService->generateSlug($name),
            'image'           => 'comparsa/comparsa.jpg',
            'date'            => $this->faker->date('Y-m-d'),
            'location'        => $this->faker->streetAddress(),
            'members'         => $this->members(),
            'extract'         => $this->faker->sentence(),
            'text'            => $this->paragraphs(3),
            'text_1'          => $this->paragraphs(5, false),
            'text_2'          => $this->paragraphs(5, false),
            'text_3'          => $this->paragraphs(5, false),
            'text_4'          => $this->paragraphs(5, false),
            'text_5'          => $this->paragraphs(5, false),
            'text_6'          => $this->paragraphs(5, false),
            'link'            => $this->faker->url(),
            'web'             => $this->faker->url(),
            'facebook'        => $this->faker->url(),
            'instagram'       => $this->faker->url(),
            'contact_name'    => $this->faker->firstName(),
            'contact_phone'   => $this->faker->phoneNumber(),
            'contact_email'   => $this->faker->safeEmail(),
            'source_form'     => 1,
            'created_user_id' => rand(1,2),
            'publish'         => 1,
        ];
    }

    public function members()
    {
        $text = '';
        for ($i=0; $i<=5; $i++) {
            $separador = $i!=5? ', ' : '';
            $text .= $this->faker->firstName() . $separador;
        }

        return $text;
    }

    public function paragraphs($n, $html = true)
    {
        if ($html) {
            return implode('<br>',$this->faker->paragraphs($n));
        }

        return implode("\n",$this->faker->paragraphs($n));
    }
}
