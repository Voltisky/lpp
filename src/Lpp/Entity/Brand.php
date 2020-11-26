<?php

namespace Lpp\Entity;

/**
 * Represents a single brand in the result.
 *
 */
class Brand
{
    /**
     * Name of the brand
     */
    private string $brand;

    /**
     * Brand's description
     */
    private string $description;

    /**
     * Unsorted list of items with their corresponding prices.
     *
     * @var Item[]
     */
    private array $items = [];

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return Brand
     */
    public function setBrand(string $brand): Brand
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Brand
     */
    public function setDescription(string $description): Brand
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @return Brand
     */
    public function setItems(array $items): Brand
    {
        $this->items = $items;
        return $this;
    }
}
