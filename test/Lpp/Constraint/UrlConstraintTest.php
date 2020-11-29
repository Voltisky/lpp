<?php


namespace Lpp\Test\Lpp\Constraint;


use Lpp\Constraint\UrlConstraint;
use PHPUnit\Framework\TestCase;

class UrlConstraintTest extends TestCase
{
    /**
     * @dataProvider urlDataProvider
     * @param mixed $url
     * @param bool $expectedValid
     */
    public function testValidateData($url, bool $expectedValid)
    {
        $constraint = new UrlConstraint();
        $resultIsValid = $constraint->validateData($url);

        $this->assertEquals($expectedValid, $resultIsValid);
    }


    public function urlDataProvider()
    {
        return [
            ["https://www.google.com", true],
            ["https://google.com", true],
            ["google.com", false],
            ["googlecom", false],
            ["", false],
            [1, false]
        ];
    }
}