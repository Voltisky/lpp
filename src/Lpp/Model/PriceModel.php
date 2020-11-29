<?php


namespace Lpp\Model;


use DateTime;

class PriceModel
{
    private string $description;
    private int $priceInEuro;
    private DateTime $arrival;
    private DateTime $due;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return PriceModel
     */
    public function setDescription(string $description): PriceModel
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
     * @return PriceModel
     */
    public function setPriceInEuro(int $priceInEuro): PriceModel
    {
        $this->priceInEuro = $priceInEuro;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getArrival(): DateTime
    {
        return $this->arrival;
    }

    /**
     * @param DateTime $arrival
     * @return PriceModel
     */
    public function setArrival(DateTime $arrival): PriceModel
    {
        $this->arrival = $arrival;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDue(): DateTime
    {
        return $this->due;
    }

    /**
     * @param DateTime $due
     * @return PriceModel
     */
    public function setDue(DateTime $due): PriceModel
    {
        $this->due = $due;
        return $this;
    }

}