<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use Faker\Factory as Faker;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $page = new Page();
        $page->title = 'Portada';
        $page->route = 'home';
        $page->text = 'Lakitas de Arica Los Mollo es una de las más antiguas y emblemáticas
        comparsas de lakas del extremo norte de Chile. Orgullosos embajadores
        del “estilo Jaiña” tanto dentro como fuera de la región de Arica y Parinacota,
        destacan por sus contagiosas cumbias, ejecutadas con precisión y maestría.
        Su variado repertorio mezcla tradición e innovación para seducir a un
        amplio público y amenizar cualquier ocasión';
        $page->gallery = 0;
        $page->save();

        $page = new Page();
        $page->title = 'Introducción';
        $page->route = 'introduction';
        $page->text = $faker->paragraphs(5, true);
        $page->gallery = 1;
        $page->save();

        $page = new Page();
        $page->title = 'Historia';
        $page->route = 'history';
        $page->text = $faker->paragraphs(5, true);
        $page->gallery = 1;
        $page->save();

        $page = new Page();
        $page->title = 'Comparsas históricas';
        $page->route = 'history';
        $page->text = $faker->paragraphs(3, true);
        $page->gallery = 1;
        $page->save();

        $page = new Page();
        $page->title = 'Viejos Sopladores';
        $page->route = 'history';
        $page->text = $faker->paragraphs(2, true);
        $page->gallery = 1;
        $page->save();

        $page = new Page();
        $page->title = 'Contacto';
        $page->route = 'contact';
        $page->text = $faker->paragraphs(3, true);
        $page->gallery = 1;
        $page->save();
    }
}
