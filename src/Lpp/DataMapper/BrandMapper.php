<?php


namespace Lpp\DataMapper;


use Lpp\Entity\Brand;
use Lpp\Exception\NormalizerClassNotFoundException;
use Lpp\Model\BrandModel;
use Lpp\Normalizer\ObjectNormalizer;

class BrandMapper implements DataMapperInterface
{
    private ObjectNormalizer $normalizer;

    private ItemMapper $itemMapper;

    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer();
        $this->itemMapper = new ItemMapper();
    }

    /**
     * Extract data from BrandModel to Brand Entity
     *
     * @param array $data
     * @return Brand|object
     * @throws NormalizerClassNotFoundException
     */
    public function extract(array $data)
    {
        /** @var BrandModel $brandModel */
        $brandModel = $this->normalizer->denormalize($data, BrandModel::class);
        $brand = new Brand();
        $brand->setBrand($brandModel->getName());
        $brand->setDescription($brandModel->getDescription());

        $items = [];
        foreach ($brandModel->getItems() as $itemDataKey => $itemData) {
            $items[$itemDataKey] = $this->itemMapper->extract($itemData);
        }

        $brand->setItems($items);

        return $brand;
    }
}