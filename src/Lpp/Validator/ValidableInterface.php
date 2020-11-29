<?php


namespace Lpp\Validator;


interface ValidableInterface
{
    /**
     * Get list of validation rules for each field
     *
     * @return array
     */
    public function getValidationRules(): array;
}