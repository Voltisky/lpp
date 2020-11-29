<?php

namespace Lpp\Service;

use Lpp\Entity\Item;
use Lpp\Service\Storage\ItemServiceInterface;

/**
 * The implementation is responsible for resolving the id of the collection from the
 * given collection name.
 *
 * Second responsibility is to sort the returning result from the item service in whatever way.
 *
 * Please write in the case study's summary if you find this approach correct or not. In both cases explain why.
 *
 */
interface BrandServiceInterface
{
    /**
     * @param string $collectionName Name of a collection to search for
     *
     * @return Item[]
     */
    public function getItemsForCollection(string $collectionName): array;

    /**
     * This is supposed to be used for testing purposes.
     * You should avoid replacing the item service at runtime.
     *
     * @param ItemServiceInterface $itemService
     *
     * @return void
     */
    public function setItemService(ItemServiceInterface $itemService): void;
}
