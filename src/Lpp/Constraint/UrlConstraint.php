<?php


namespace Lpp\Constraint;


class UrlConstraint implements ConstraintInterface
{
    /**
     * @inheritDoc
     */
    public function validateData($data): bool
    {
        if (!is_string($data)) {
            return false;
        }

        return !!filter_var($data, FILTER_VALIDATE_URL);
    }

    /**
     * @inheritDoc
     */
    public function getMessage(): string
    {
        return "Wrong URL format";
    }
}