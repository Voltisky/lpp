<?php


namespace Lpp\DataMapper;


interface DataMapperInterface
{
    /**
     * @param array $data
     * @return object
     */
    public function extract(array $data);
}