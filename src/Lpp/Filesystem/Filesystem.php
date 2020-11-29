<?php


namespace Lpp\Filesystem;


use Lpp\Exception\FilesystemFileNotFoundException;
use SplFileInfo;

class Filesystem
{
    private string $rootDir;

    public function __construct()
    {
        $this->rootDir = __DIR__."/../../..";
    }

    /**
     * @param string $filePath
     * @return SplFileInfo|null
     * @throws FilesystemFileNotFoundException
     */
    public function getFileContent(string $filePath): string
    {
        if (!$this->fileExists($filePath)) {
            throw new FilesystemFileNotFoundException();
        }

        return file_get_contents($filePath);
    }

    public function fileExists(string $filePath): bool
    {
        return file_exists($filePath);
    }

    public function getRootDir(): string
    {
        return $this->rootDir;
    }
}