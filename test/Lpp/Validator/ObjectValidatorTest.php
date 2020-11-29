<?php


namespace Lpp\Test\Lpp\Validator;


use Lpp\Entity\Item;
use Lpp\Validator\ObjectValidator;
use PHPUnit\Framework\TestCase;

class ObjectValidatorTest extends TestCase
{
    private ObjectValidator $objectValidator;

    public function setUp(): void
    {
        parent::setUp();
        $this->objectValidator = new ObjectValidator();
    }

    public function testWrongValidateObjectOfItemClass()
    {
        $item = new Item();
        $item->setUrl("Wrong Url");

        $errors = $this->objectValidator->validateObject($item);
        $this->assertNotEmpty($errors);
    }

    public function testValidateObjectOfItemClass()
    {
        $item = new Item();
        $item->setUrl("http://google.pl");

        $errors = $this->objectValidator->validateObject($item);
        $this->assertEmpty($errors);
    }
}