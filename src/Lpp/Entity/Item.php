<?php

namespace Lpp\Entity;

use Lpp\Constraint\UrlConstraint;
use Lpp\Validator\ValidableInterface;

/**
 * Represents a single item from a search result.
 */
class Item implements ValidableInterface
{
    /**
     * Name of the item
     */
    private string $name;

    /**
     * Url of the item's page
     */
    private string $url;

    /**
     * Unsorted list of prices received from the actual search query.
     */
    private array $prices = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Item
     */
    public function setName(string $name): Item
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
     * @return Item
     */
    public function setUrl(string $url): Item
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return Price[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param Price[] $prices
     * @return Item
     */
    public function setPrices(array $prices): Item
    {
        $this->prices = $prices;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getValidationRules(): array
    {
        return [
            "url" => [new UrlConstraint()]
        ];
    }
}
