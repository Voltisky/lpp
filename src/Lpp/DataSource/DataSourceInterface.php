<?php


namespace Lpp\DataSource;


interface DataSourceInterface
{
    /**
     * Find Item by Id
     *
     * @param int $id
     * @return array|object
     */
    public function findById(int $id);
}