<?php


namespace Lpp\Constraint;


interface ConstraintInterface
{

    /**
     * Validate passed data and return success state
     *
     * @param $data
     * @return bool
     */
    public function validateData($data): bool;

    /**
     * Get message of constraint validation error
     *
     * @return string
     */
    public function getMessage(): string;
}