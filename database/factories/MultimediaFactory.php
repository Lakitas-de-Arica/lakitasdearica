<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\Multimedia\MultimediaService;

class MultimediaFactory extends Factory
{
    protected $multimediaService;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->multimediaService = new MultimediaService();
        $title = $this->faker->sentence();

        $image = [
            0 => null,
            1 => 'multimedia/004466.png'
        ];

        $format = $this->multimediaService->getFormats()[rand(0,3)];

        return [
            'title'           => $title,
            'slug'            => $this->multimediaService->generateSlug($title),
            'image'           => $image[rand(0,1)],
            'date'            => $this->faker->date('Y-m-d'),
            'format'          => $format,
            'file'            => $this->getFile($format),
            'description'     => $this->paragraphs(2),
            'link'            => $this->faker->url(),
            'publish'         => 1,
            'created_user_id' => rand(1,2),
            'comparsa_id'     => rand(1,50)
        ];
    }

    public function getFile($format)
    {
        $mp3 = [
            0 => 'multimedia/01-Diana_Bendicion.mp3',
            1 => 'multimedia/03-Cholo soy.mp3',
            2 => 'multimedia/08-Encuentro.mp3',
            3 => 'multimedia/10-Muy lejano.mp3',
        ];

        switch ($format) {
            case 'PDF':
                return 'multimedia/LakitasUI.pdf'; break;

            case 'MP3':
                return $mp3[rand(0,3)]; break;

            case 'VIDEO':
                return 'https://www.youtube.com/watch?v=d4ikfmQIAOs'; break;

            case 'IMAGEN':
                return $this->faker->imageUrl(640, 480, 'multimedia', true); break;

            default:
                return null;
        }
    }

    public function paragraphs($n)
    {
        return implode('<br>',$this->faker->paragraphs($n));
    }
}
