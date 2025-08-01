<?php

declare(strict_types=1);

class UserRegistrationService
{
    public function __construct(private Validator $validator) {}

    public function register(string $email): string
    {
        // Calls instance method
        if (! $this->validator->isValidEmailInstance($email)) {
            throw new InvalidArgumentException('Invalid email address provided.');
        }

        // Simulate registration process
        return "User with email $email registered successfully.";
    }
}
