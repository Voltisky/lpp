<?php


namespace Lpp\Normalizer;


use DateTime;
use DateTimeInterface;
use Exception;
use Lpp\Exception\NormalizerClassNotFoundException;
use ReflectionClass;
use ReflectionException;

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

    /**
     * Map data from array to the instance.
     * Handle extracting data of DateTime and create instance
     *
     * @param object $instance
     * @param array $data
     * @return object
     */
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

    /**
     * Prepare for value for instance field
     *
     * @param object $instance
     * @param $fieldNameOrIndex
     * @param $fieldValue
     * @return DateTime
     * @throws Exception
     */
    private function prepareInstanceValue(object $instance, $fieldNameOrIndex, $fieldValue)
    {
        $returnValue = $fieldValue;
        if (in_array($this->getInstanceFieldType($instance, $fieldNameOrIndex), [DateTime::class, DateTimeInterface::class])) {
            $returnValue = $this->getDataValueDateTime($returnValue);
        }

        return $returnValue;
    }

    /**
     * Get type of instance field, handled by Reflections
     *
     * @param object $instance
     * @param string $fieldName
     * @return string
     * @throws ReflectionException
     */
    private function getInstanceFieldType(object $instance, string $fieldName): string
    {
        $reflectionClass = new ReflectionClass(get_class($instance));
        $reflectionMethod = $reflectionClass->getMethod("get" . ucfirst($fieldName));

        return (string)$reflectionMethod->getReturnType();
    }

    /**
     * Create instance of DateTime fo passed string data
     *
     * @param $fieldValue
     * @return DateTime
     * @throws Exception
     */
    private function getDataValueDateTime(string $fieldValue)
    {
        return new DateTime($fieldValue);
    }
}