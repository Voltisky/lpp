<?php


namespace Lpp\Serializer;


use Lpp\Exception\SerializerWrongFormatException;
use Lpp\Normalizer\ObjectNormalizer;

class JsonSerializer implements SerializerInterface
{
    private ObjectNormalizer $normalizer;

    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer();
    }

    /**
     * @inheritDoc
     * @throws SerializerWrongFormatException
     */
    public function deserialize(string $data): array
    {
        return $this->decode($data);
    }

    /**
     * Decode string with JSON to array
     *
     * @param string $data
     * @return array
     * @throws SerializerWrongFormatException
     */
    private function decode(string $data): array
    {
        $decodedData = json_decode($data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new SerializerWrongFormatException();
        }

        return $decodedData;
    }
}