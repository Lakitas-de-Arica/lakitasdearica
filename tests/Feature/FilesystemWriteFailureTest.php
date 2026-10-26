<?php

namespace Tests\Feature;

use Illuminate\Filesystem\FilesystemAdapter as LaravelFilesystemAdapter;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\FilesystemOperator;
use League\Flysystem\UnableToWriteFile;
use Mockery;
use Tests\TestCase;

class FilesystemWriteFailureTest extends TestCase
{
    public function test_public_disk_throws_when_a_file_write_fails()
    {
        $driver = Mockery::mock(FilesystemOperator::class);
        $driver->shouldReceive('write')
            ->once()
            ->andThrow(UnableToWriteFile::atLocation('multimedia/file.jpg'));

        $adapter = Mockery::mock(FilesystemAdapter::class);
        $filesystem = new LaravelFilesystemAdapter(
            $driver,
            $adapter,
            config('filesystems.disks.public')
        );

        $this->expectException(UnableToWriteFile::class);

        $filesystem->put('multimedia/file.jpg', 'contents');
    }
}
