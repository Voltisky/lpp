<?php


namespace Lpp\Normalizer;


use Lpp\Exception\NormalizerClassNotFoundException;

interface NormalizerInterface
{
    /**
     * @param array $data
     * @param string $type
     * @return object|object[]
     * @throws NormalizerClassNotFoundException
     */
    public function denormalize(array $data, string $type);
}