<?php


namespace Lpp\Normalizer;


use DateTime;
use DateTimeInterface;
use Exception;
use Lpp\Exception\NormalizerClassNotFoundException;
use ReflectionClass;

class ObjectNormalizer implements NormalizerInterface
{
    /**
     * @inheritDoc
     */
    public function denormalize(array $data, string $type)
    {
        if (!class_exists($type)) {
            throw new NormalizerClassNotFoundException();
        }

        $instance = new $type();

        return $this->assignProperties($instance, $data);
    }

    private function assignProperties(object $instance, array $data)
    {
        foreach ($data as $dataFieldOrIndex => $dataValue) {
            $prepareDataValue = $this->prepareInstanceValue($instance, $dataFieldOrIndex, $dataValue);
            $setterMethodName = sprintf("set%s", ucfirst($dataFieldOrIndex));
            if (method_exists($instance, $setterMethodName)) {
                $instance->$setterMethodName($prepareDataValue);
            }
        }

        return $instance;
    }

    private function prepareInstanceValue(object $instance, $fieldNameOrIndex, $fieldValue)
    {
        $returnValue = $fieldValue;
        if (in_array($this->getInstanceFieldType($instance, $fieldNameOrIndex), [DateTime::class, DateTimeInterface::class])) {
            $returnValue = $this->getDataValueDateTime($returnValue);
        }

        return $returnValue;
    }

    /**
     * @param $fieldValue
     * @return DateTime
     * @throws Exception
     */
    private function getDataValueDateTime($fieldValue)
    {
        return new DateTime($fieldValue);
    }

    private function getInstanceFieldType(object $instance, string $fieldName): string
    {
        $reflectionClass = new ReflectionClass(get_class($instance));
        $reflectionMethod = $reflectionClass->getMethod("get" . ucfirst($fieldName));

        return (string)$reflectionMethod->getReturnType();
    }
}