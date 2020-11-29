<?php


namespace Lpp\Test\Lpp\Serializer;


use DateTime;
use Lpp\Entity\Item;
use Lpp\Exception\NormalizerClassNotFoundException;
use Lpp\Model\PriceModel;
use Lpp\Normalizer\ObjectNormalizer;
use PHPUnit\Framework\TestCase;

class ObjectNormalizerTest extends TestCase
{
    private ObjectNormalizer $normalizer;

    public function testDenormalizeItemClass()
    {
        /** @var Item $item */
        $item = $this->normalizer->denormalize([
            "name" => "Item 1",
            "url" => "/item-1",
            "prices" => []
        ], Item::class);

        $this->assertEquals("Item 1", $item->getName());
        $this->assertEquals("/item-1", $item->getUrl());
        $this->assertIsArray($item->getPrices());
    }

    public function testDenormalizeDateTimeAutoDetect()
    {
        $expectedDate = "2020-11-29";

        /** @var PriceModel $priceModel */
        $priceModel = $this->normalizer->denormalize([
            "due" => $expectedDate
        ], PriceModel::class);

        $this->assertInstanceOf(DateTime::class, $priceModel->getDue());
        $this->assertEqualsIgnoringCase($expectedDate, $priceModel->getDue()->format("Y-m-d"));
    }

    public function testDenormalizeClassNotFoundException()
    {
        $this->expectException(NormalizerClassNotFoundException::class);
        $this->normalizer->denormalize([], "NotExistingClassName");
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->normalizer = new ObjectNormalizer();
    }
}