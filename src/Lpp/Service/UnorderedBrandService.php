<?php

namespace Lpp\Service;

use InvalidArgumentException;
use Lpp\Entity\Brand;
use Lpp\Service\Storage\ItemServiceInterface;

class UnorderedBrandService implements BrandServiceInterface
{
    private ItemServiceInterface $itemService;

    /**
     * Maps from collection name to the id for the item service.
     */
    private array $collectionNameToIdMapping = [
        "winter" => 1315475
    ];

    /**
     * @param ItemServiceInterface $itemService
     */
    public function __construct(ItemServiceInterface $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * @param string $collectionName Name of the collection to search for.
     *
     * @return Brand[]
     */
    public function getBrandsForCollection(string $collectionName)
    {
        if (empty($this->collectionNameToIdMapping[$collectionName])) {
            throw new InvalidArgumentException(sprintf('Provided collection name [%s] is not mapped.', $collectionName));
        }

        $collectionId = $this->collectionNameToIdMapping[$collectionName];

        return $this->itemService->getResultForCollectionId($collectionId);
    }


    /**
     * This is supposed to be used for testing purposes.
     * You should avoid replacing the item service at runtime.
     *
     * @param ItemServiceInterface $itemService
     *
     * @return void
     */
    public function setItemService(ItemServiceInterface $itemService): void
    {
        $this->itemService = $itemService;
    }

    public function getItemsForCollection(string $collectionName): array
    {
        // TODO: Prepare implementation
    }
}
