<?php


namespace Lpp\Test\Lpp\Service;


use InvalidArgumentException;
use Lpp\DataSource\JsonFilesystemDataSource;
use Lpp\Service\NameOrderedBrandService;
use Lpp\Service\Storage\ItemService;
use PHPUnit\Framework\TestCase;

class NamedOrderedBrandServiceTest extends TestCase
{
    private NameOrderedBrandService $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new NameOrderedBrandService(new ItemService(new JsonFilesystemDataSource()));
    }

    public function testGetBrandsForCollectionInvalidCollectionName()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->service->getBrandsForCollection("spring");
    }

    public function testGetBrandsForCollectionSummer()
    {
        $brands = $this->service->getBrandsForCollection("summer");
        $items = $this->service->getItemsForCollection("summer");

        $this->assertCount(3, $brands);
        $this->assertCount(3, $items);
    }

    public function testGetBrandsForCollectionSummerOrderedByNames()
    {
        $brands = $this->service->getBrandsForCollection("summer");

        $this->assertEquals("A", $brands[0]->getBrand());
        $this->assertEquals("B", $brands[1]->getBrand());
        $this->assertEquals("C", $brands[2]->getBrand());
    }
}