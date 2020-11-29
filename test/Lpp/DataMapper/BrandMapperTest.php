<?php


namespace Lpp\Test\Lpp\DataMapper;


use Lpp\DataMapper\BrandMapper;
use Lpp\Entity\Brand;
use PHPUnit\Framework\TestCase;

class BrandMapperTest extends TestCase
{
    public function testExtract()
    {
        $mapper = new BrandMapper();

        $brand = $mapper->extract([
            "name" => "Name A",
            "description" => "Description A",
            "items" => [
                ["name" => "Item A", "url" => "https://google.com", "prices" => []],
                ["name" => "Item B", "url" => "https://wp.pl", "prices" => []],
            ]
        ]);

        $this->assertInstanceOf(Brand::class, $brand);
        $this->assertEquals("Name A", $brand->getBrand());
        $this->assertCount(2, $brand->getItems());
    }
}