<?php


namespace Lpp\Serializer;

/**
 * Interface SerializerInterface
 * Represents the specific format to real object presentation
 *
 * @package Lpp\Serializer
 */
interface SerializerInterface
{
    /**
     * Deserializes data into the given type.
     *
     * @param string $data
     *
     * @return array
     */
    public function deserialize(string $data): array;
}