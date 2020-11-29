<?php


namespace Lpp\Filesystem;


use Lpp\Exception\FilesystemFileNotFoundException;
use SplFileInfo;

class Filesystem
{
    private string $rootDir;

    public function __construct()
    {
        $this->rootDir = realpath("../../../");
    }

    /**
     * @param string $filePath
     * @return SplFileInfo|null
     * @throws FilesystemFileNotFoundException
     */
    public function getFile(string $filePath): ?SplFileInfo
    {
        if (!$this->fileExists($filePath)) {
            throw new FilesystemFileNotFoundException();
        }

        return new SplFileInfo($filePath);
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