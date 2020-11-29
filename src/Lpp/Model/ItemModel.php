<?php


namespace Lpp\Model;


class ItemModel
{
    private string $name;
    private string $url;
    private array $prices;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ItemModel
     */
    public function setName(string $name): ItemModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return ItemModel
     */
    public function setUrl(string $url): ItemModel
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param array $prices
     * @return ItemModel
     */
    public function setPrices(array $prices): ItemModel
    {
        $this->prices = $prices;
        return $this;
    }
}