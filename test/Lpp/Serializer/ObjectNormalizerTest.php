<?php


namespace Lpp\Test\Lpp\Serializer;


use Lpp\Entity\Item;
use Lpp\Exception\NormalizerClassNotFoundException;
use Lpp\Normalizer\ObjectNormalizer;
use PHPUnit\Framework\TestCase;

class ObjectNormalizerTest extends TestCase
{
    private ObjectNormalizer $normalizer;

    public function testDenormalizeItemClass()
    {
//        $this->expectException(NormalizerClassNotFoundException::class);
        $this->normalizer->denormalize([
            "name" => "Item 1",
            "url" => "/item-1",
            "prices" => [
                "100" => [
                    "description" => "Initial price",
                    "priceInEuro" => 108,
                    "arrival" => "2017-01-03",
                    "due" => "2017-01-20"
                ]
            ]
        ], Item::class);
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