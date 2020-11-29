<?php


namespace Lpp\Model;


class BrandModel
{
    private string $name;
    private string $description;
    private array $items = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BrandModel
     */
    public function setName(string $name): BrandModel
    {
        $this->name = $name;
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
     * @return BrandModel
     */
    public function setDescription(string $description): BrandModel
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return BrandModel
     */
    public function setItems(array $items): BrandModel
    {
        $this->items = $items;
        return $this;
    }

}