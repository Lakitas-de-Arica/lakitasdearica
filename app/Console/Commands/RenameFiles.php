<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RenameFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'files:rename';

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
        $directory = public_path('files'); // Ruta completa a /public/files

        if (!File::exists($directory)) {
            $this->error("El directorio /public/files no existe.");
            return;
        }

        $files = File::files($directory);

        foreach ($files as $file) {
            $originalName = $file->getFilename();
            $extension = $file->getExtension();
            $baseName = pathinfo($originalName, PATHINFO_FILENAME);

            // Convertir a slug
            $slugName = Str::slug($baseName);

            // Nombre final con la extensión original
            $newName = $slugName . '.' . $extension;

            if ($originalName !== $newName) {
                File::move($file->getPathname(), $directory . '/' . $newName);
                $this->info("Renombrado: $originalName -> $newName");
            }
        }

        $this->info("Proceso completado.");
    }
}
