<?php


namespace Lpp\Validator;


use Lpp\Constraint\ConstraintInterface;

class Validator
{
    public function validate(array $data, array $validateData): array
    {
        if (empty($validateData)) {
            return [];
        }

        $errors = [];
        foreach ($validateData as $validateFieldName => $validationRules) {
            if (!array_key_exists($validateFieldName, $data)) {
                continue;
            }

            /** @var ConstraintInterface[] $validationRules */
            foreach ($validationRules as $validationRule) {
                if ($validationRule instanceof ConstraintInterface) {
                    $this->validateField($validationRule, $validateFieldName, $data[$validateFieldName], $errors);
                }
            }
        }

        return $errors;
    }

    private function validateField(ConstraintInterface $validationRule, $fieldName, $fieldValue, &$errors)
    {
        if (!$validationRule->validateData($fieldValue)) {
            if (array_key_exists($fieldName, $errors)) {
                $errors[$fieldName] = [];
            }

            $errors[$fieldName][] = $validationRule->getMessage();
        }
    }
}