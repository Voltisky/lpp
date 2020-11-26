<?php

namespace Lpp\Entity;

use DateTime;

/**
 * Represents a single price from a search result
 * related to a single item.
 */
class Price
{
    /**
     * Description text for the price
     */
    private string $description;

    /**
     * Price in euro
     */
    private int $priceInEuro;

    /**
     * Warehouse's arrival date (to)
     */
    private DateTime $arrivalDate;

    /**
     * Due to date,
     * defining how long will the item be available for sale (i.e. in a collection)
     */
    private DateTime $dueDate;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Price
     */
    public function setDescription(string $description): Price
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriceInEuro(): int
    {
        return $this->priceInEuro;
    }

    /**
     * @param int $priceInEuro
     * @return Price
     */
    public function setPriceInEuro(int $priceInEuro): Price
    {
        $this->priceInEuro = $priceInEuro;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getArrivalDate(): DateTime
    {
        return $this->arrivalDate;
    }

    /**
     * @param DateTime $arrivalDate
     * @return Price
     */
    public function setArrivalDate(DateTime $arrivalDate): Price
    {
        $this->arrivalDate = $arrivalDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param DateTime $dueDate
     * @return Price
     */
    public function setDueDate(DateTime $dueDate): Price
    {
        $this->dueDate = $dueDate;
        return $this;
    }
}
