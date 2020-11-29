<?php


namespace Lpp\DataMapper;


use Lpp\Constraint\UrlConstraint;
use Lpp\Entity\Item;
use Lpp\Exception\NormalizerClassNotFoundException;
use Lpp\Model\ItemModel;
use Lpp\Normalizer\ObjectNormalizer;
use Lpp\Validator\Validator;

class ItemMapper implements DataMapperInterface
{
    private ObjectNormalizer $normalizer;
    private PriceMapper $priceMapper;
    private Validator $validator;

    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer();
        $this->priceMapper = new PriceMapper();
        $this->validator = new Validator();
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
        $errors = $this->validator->validate($data, [
            "url" => [new UrlConstraint()]
        ]);

        if (!empty($errors)) {
            return null;
        }

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