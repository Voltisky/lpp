<?php


namespace Lpp\Validator;


class ObjectValidator extends Validator
{
    /**
     * Validation depending on defined rules for Instance
     * @param ValidableInterface $instance
     * @return array
     */
    public function validateObject(ValidableInterface $instance)
    {
        $validationRules = $instance->getValidationRules();
        $data = [];

        foreach ($validationRules as $fieldName => $fieldRule) {
            $getterMethod = "get" . ucfirst($fieldName);
            if (method_exists($instance, $getterMethod)) {
                $instanceFieldValue = $instance->$getterMethod();
                $data[$fieldName] = $instanceFieldValue;
            }
        }

        return $this->validate($data, $validationRules);
    }
}