<?php


namespace Lpp\DataMapper;


use Lpp\Entity\Price;
use Lpp\Exception\NormalizerClassNotFoundException;
use Lpp\Model\PriceModel;
use Lpp\Normalizer\ObjectNormalizer;

class PriceMapper implements DataMapperInterface
{
    private ObjectNormalizer $normalizer;

    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer();
    }

    /**
     * Extract data from PriceModel to Price Entity
     *
     * @param array $data
     * @return Price|object
     * @throws NormalizerClassNotFoundException
     */
    public function extract(array $data)
    {
        /** @var PriceModel $priceModel */
        $priceModel = $this->normalizer->denormalize($data, PriceModel::class);
        $price = new Price();
        $price->setDescription($priceModel->getDescription());
        $price->setPriceInEuro($priceModel->getPriceInEuro());
        $price->setArrivalDate($priceModel->getArrival());
        $price->setDueDate($priceModel->getDue());

        return $price;
    }
}