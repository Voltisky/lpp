<?php


namespace Lpp\DataSource;


interface DataSourceInterface
{
    /**
     * @param int $id
     * @return array|object
     */
    public function findById(int $id);
}