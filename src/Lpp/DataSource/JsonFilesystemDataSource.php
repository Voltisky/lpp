<?php


namespace Lpp\DataSource;


use Lpp\Exception\FilesystemFileNotFoundException;
use Lpp\Filesystem\Filesystem;

class JsonFilesystemDataSource implements DataSourceInterface
{
    private Filesystem $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    /**
     * @inheritDoc
     * @throws FilesystemFileNotFoundException
     */
    public function findById(int $id)
    {
        $itemPath = $this->getItemPath($id);
        return $this->filesystem->getFile($itemPath);
    }

    private function getItemPath(int $id)
    {
        return sprintf("%s/%s.json", $this->getDataDirectory(), $id);
    }

    /**
     * Get Path for place where data is stored
     *
     * @return string
     */
    private function getDataDirectory(): string
    {
        return sprintf("%s/%s", $this->filesystem->getRootDir(), "data");
    }
}