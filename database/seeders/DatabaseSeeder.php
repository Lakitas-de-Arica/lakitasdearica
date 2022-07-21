<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Comparsa;
use App\Models\Multimedia;

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
            UserAdmin::class
        ]);

        News::factory(150)->create();
        Comparsa::factory(150)->create();
        Multimedia::factory(500)->create();
    }
}
