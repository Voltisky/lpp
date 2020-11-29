<?php


namespace Lpp\Service\Storage;


use Lpp\DataMapper\BrandMapper;
use Lpp\DataSource\DataSourceInterface;
use Lpp\Entity\Brand;
use Lpp\Exception\NormalizerClassNotFoundException;
use Lpp\Model\Collection;
use Lpp\Normalizer\ObjectNormalizer;

class ItemService implements ItemServiceInterface
{
    private DataSourceInterface $dataSource;

    private ObjectNormalizer $normalizer;

    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
        $this->normalizer = new ObjectNormalizer();
    }

    /**
     * @inheritDoc
     * @throws NormalizerClassNotFoundException
     */
    public function getResultForCollectionId(int $collectionId): array
    {
        $collectionData = $this->dataSource->findById($collectionId);

        /** @var Collection $collection */
        $collection = $this->normalizer->denormalize($collectionData, Collection::class);

        return $this->getBrandsFromCollection($collection);
    }

    /**
     * Map data from Collection instance to collection of Brand
     *
     * @param Collection $collection
     *
     * @return Brand[]
     * @throws NormalizerClassNotFoundException
     */
    private function getBrandsFromCollection(Collection $collection)
    {
        $brandMapper = new BrandMapper();
        $brands = [];

        foreach ($collection->getBrands() as $brandDataKey => $brandData) {
            $brands[$brandDataKey] = $brandMapper->extract($brandData);
        }

        return $brands;
    }
}