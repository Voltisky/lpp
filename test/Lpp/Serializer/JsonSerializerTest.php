<?php

namespace Lpp\Test;

use Lpp\Entity\Item;
use Lpp\Exception\SerializerWrongFormatException;
use Lpp\Serializer\JsonSerializer;
use Lpp\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

class JsonSerializerTest extends TestCase
{
    private SerializerInterface $serializer;

    public function setUp(): void
    {
        parent::setUp();
        $this->serializer = new JsonSerializer();
    }

    public function testDeserializeThrowingException()
    {
        $this->expectException(SerializerWrongFormatException::class);
        $this->serializer->deserialize("", Item::class);
    }

    /**
     * @throws SerializerWrongFormatException
     */
    public function testDeserializeObjectResult()
    {
        $result = $this->serializer->deserialize("{}", Item::class);

        var_dump($result);exit;
    }
}