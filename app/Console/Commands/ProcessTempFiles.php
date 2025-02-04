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

    public function handle()
    {
        //Eliminar todos los registros de la tabla multimedia
        Multimedia::truncate();

        $basePath = resource_path('temp-files');
        $directories = File::directories($basePath);

        foreach ($directories as $directory) {
            $comparsaName = basename($directory);

            if ($comparsaName === 'Otros') {
                $comparsaId = null;
            } else {
                $comparsa = Comparsa::where('name', $comparsaName)->first();
                if (!$comparsa) {
                    $this->error("Comparsa not found: $comparsaName");
                    continue;
                }
                $comparsaId = $comparsa->id;
            }

            $this->processDirectory($directory, $comparsaId);
        }

        $this->info('Multimedia files processed successfully.');
    }

    protected function processDirectory($directory, $comparsaId)
    {
        $files = File::allFiles($directory);

        foreach ($files as $file) {
            $fileName = $file->getFilename();
            $filePath = $file->getPathname();
            $fileExtension = $file->getExtension();
            $fileTitle = $this->generateTitle($file);
            $fileFormat = $this->getFileFormat($fileExtension);
            $fileSize = $file->getSize(); // Obtener el tamaño del archivo en bytes

            // Definir la carpeta de destino según el tamaño del archivo
            $storageFolder = ($fileSize > 100 * 1024 * 1024) ? 'large-files' : 'multimedia';

            // Usar el nombre original del archivo si está en la carpeta large-files
            $storageFileName = ($storageFolder === 'large-files') ? $fileName : Str::random(40) . '.' . $fileExtension;
            $storagePath = $storageFolder . '/' . $storageFileName;

            // Copiar el archivo a la carpeta correspondiente
            Storage::disk('public')->put($storagePath, File::get($filePath));

            // Crear el registro en la base de datos
            $multimedia = new Multimedia();
            $multimedia->title = $fileTitle;
            $multimedia->slug = Str::slug($fileTitle);
            $multimedia->format = $fileFormat;
            $multimedia->file = $storagePath;
            $multimedia->comparsa_id = $comparsaId;
            $multimedia->publish = true;
            $multimedia->created_user_id = 1;
            $multimedia->save();

            // Si es una imagen, duplicar la ruta en el campo `image`
            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                $multimedia->image = $storagePath;
                $multimedia->save();
            }

            // Mostrar un mensaje informativo si el archivo es grande
            if ($fileSize > 100 * 1024 * 1024) {
                $this->info("Archivo grande copiado: $fileName ($fileSize bytes)");
                $this->info("Ruta del archivo: $filePath");
            }
        }
    }

    protected function generateTitle($file)
    {
        $path = $file->getRelativePath();
        $fileName = $file->getFilenameWithoutExtension();
        return $path ? "$path - $fileName" : $fileName;
    }

    protected function getFileFormat($extension)
    {
        switch ($extension) {
            case 'pdf':
                return 'PDF';
            case 'mp3':
                return 'MP3';
            case 'wav':
                return 'WAV';
            case 'doc':
            case 'docx':
                return 'DOC';
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                return 'IMAGEN';
            default:
                return 'OTRO';
        }
    }
}
