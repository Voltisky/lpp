<?php


namespace Lpp\DataMapper;


use Lpp\Entity\Item;
use Lpp\Exception\NormalizerClassNotFoundException;
use Lpp\Model\ItemModel;
use Lpp\Normalizer\ObjectNormalizer;

class ItemMapper implements DataMapperInterface
{
    private ObjectNormalizer $normalizer;

    private PriceMapper $priceMapper;

    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer();
        $this->priceMapper = new PriceMapper();
    }

    /**
     * Extract data from ItemModel to Item Entity
     *
     * @param array $data
     * @return Item|object
     * @throws NormalizerClassNotFoundException
     */
    public function extract(array $data)
    {
        /** @var ItemModel $itemModel */
        $itemModel = $this->normalizer->denormalize($data, ItemModel::class);
        $item = new Item();
        $item->setName($itemModel->getName());
        $item->setUrl($itemModel->getUrl());

        $prices = [];
        foreach ($itemModel->getPrices() as $priceDataKey => $priceData) {
            $prices[$priceDataKey] = $this->priceMapper->extract($priceData);
        }

        $item->setPrices($prices);
        return $item;
    }
}