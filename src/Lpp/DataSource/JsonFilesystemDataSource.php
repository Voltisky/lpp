<?php


namespace Lpp\DataSource;


use Lpp\Exception\FilesystemFileNotFoundException;
use Lpp\Exception\SerializerWrongFormatException;
use Lpp\Filesystem\Filesystem;
use Lpp\Serializer\JsonSerializer;

class JsonFilesystemDataSource implements DataSourceInterface
{
    private Filesystem $filesystem;

    private JsonSerializer $serializer;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
        $this->serializer = new JsonSerializer();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id)
    {
        $itemPath = $this->getItemPath($id);
        try {
            $fileContent = $this->filesystem->getFileContent($itemPath);

            return $this->serializer->deserialize($fileContent);
        } catch (FilesystemFileNotFoundException $e) {
            return null;
        } catch (SerializerWrongFormatException $e) {
            return null;
        }
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