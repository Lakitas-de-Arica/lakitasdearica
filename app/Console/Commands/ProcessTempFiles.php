<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Comparsa;
use App\Models\Multimedia;
use Illuminate\Support\Str;

class ProcessTempFiles extends Command
{
    protected $signature = 'import:multimedia';

    protected $description = 'Process multimedia files in the temp-files directory and associate them with Comparsas.';

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
        $sourcePath = resource_path('temp-files');
        $destinationPath = 'public/multimedia';
        
        if (!is_dir($sourcePath)) {
            $this->error("El directorio {$sourcePath} no existe.");
            return;
        }

        $folders = array_diff(scandir($sourcePath), ['.', '..']);
    
        foreach ($folders as $folder) {
            $folderPath = "$sourcePath/$folder";
            
            if (!is_dir($folderPath)) {
                continue;
            }
            
            $comparsa = $folder !== 'Otros' ? Comparsa::where('name', $folder)->first() : null;
            $files = array_diff(scandir($folderPath), ['.', '..']);
            
            foreach ($files as $file) {
                $filePath = "$folderPath/$file";
                
                if (!is_file($filePath)) {
                    continue;
                }
                
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                $title = pathinfo($file, PATHINFO_FILENAME);
                $slug = Str::slug($title . '-' . Str::random(8));
                $newFileName = Str::random(40) . ".{$extension}";
                
                // Definir el formato del archivo
                $format = match ($extension) {
                    'pdf' => 'PDF',
                    'mp3' => 'MP3',
                    'wav' => 'WAV',
                    'JPG', 'jpg', 'jpeg', 'png', 'gif' => 'IMAGEN',
                    default => strtoupper($extension)
                };

                // Copiar archivo a storage/app/public/multimedia
                $storedPath = "multimedia/{$newFileName}";
                Storage::disk('public')->put($storedPath, file_get_contents($filePath));
                
                // Crear registro en la base de datos
                Multimedia::create([
                    'title' => $title,
                    'slug' => $slug,
                    'image' => in_array($extension, ['JPG', 'jpg', 'jpeg', 'png', 'gif']) ? $storedPath : null,
                    'format' => $format,
                    'file' => $storedPath,
                    'comparsa_id' => $comparsa?->id,
                    'publish' => true,
                    'created_user_id' => 1,
                ]);
                
                $this->info("Importado: {$file} -> {$storedPath}");
            }
        }
        
        $this->info('Importación completada.');
    }
}
