<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class FakerFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lakitas:faker-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Storage::disk('public')->makeDirectory('news');
        copy(storage_path('fakerfiles/new.jpg'), storage_path('app/public/news/new.jpg'));

        Storage::disk('public')->makeDirectory('comparsa');
        copy(storage_path('fakerfiles/comparsa.jpg'), storage_path('app/public/comparsa/comparsa.jpg'));

        Storage::disk('public')->makeDirectory('multimedia');
        copy(storage_path('fakerfiles/multimedia/01-Diana_Bendicion.mp3'), storage_path('app/public/multimedia/01-Diana_Bendicion.mp3'));
        copy(storage_path('fakerfiles/multimedia/03-Cholo soy.mp3'), storage_path('app/public/multimedia/03-Cholo soy.mp3'));
        copy(storage_path('fakerfiles/multimedia/08-Encuentro.mp3'), storage_path('app/public/multimedia/08-Encuentro.mp3'));
        copy(storage_path('fakerfiles/multimedia/10-Muy lejano.mp3'), storage_path('app/public/multimedia/10-Muy lejano.mp3'));
        copy(storage_path('fakerfiles/multimedia/LakitasUI.pdf'), storage_path('app/public/multimedia/LakitasUI.pdf'));
        copy(storage_path('fakerfiles/multimedia/004466.png'), storage_path('app/public/multimedia/004466.png'));
    }
}
