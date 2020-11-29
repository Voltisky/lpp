<?php


namespace Lpp\Normalizer;


use Lpp\Exception\NormalizerClassNotFoundException;

interface NormalizerInterface
{
    /**
     * Create passed $type instance and pass data informations to the instance
     *
     * @param array $data
     * @param string $type
     * @return object|object[]
     * @throws NormalizerClassNotFoundException
     */
    public function denormalize(array $data, string $type);
}