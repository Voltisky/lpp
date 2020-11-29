<?php


namespace Lpp\Model;


class Collection
{
    private int $id;

    private string $collection;

    private array $brands;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function setId(int $id): Collection
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollection(): string
    {
        return $this->collection;
    }

    /**
     * @param string $collection
     * @return Collection
     */
    public function setCollection(string $collection): Collection
    {
        $this->collection = $collection;
        return $this;
    }

    /**
     * @return array
     */
    public function getBrands(): array
    {
        return $this->brands;
    }

    /**
     * @param array $brands
     * @return Collection
     */
    public function setBrands(array $brands): Collection
    {
        $this->brands = $brands;
        return $this;
    }
}