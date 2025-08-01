<?php

declare(strict_types=1);

class Validator
{
    // Static methods can't be directly mocked in PHPUnit
    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Best thing to do is create an instance method in this case
    public function isValidEmailInstance(string $email): bool
    {
        return static::isValidEmail($email);
    }
}
