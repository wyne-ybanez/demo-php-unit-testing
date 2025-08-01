<?php

declare(strict_types=1);

class UserRegistrationService
{
    public function __construct(private Closure $validatorCallback) {}

    public function register(string $email): string
    {
        // We test this method call in isolation using our callback.
        // This is handy for testing methods from 3rd party services.

        if (! forward_static_call($this->validatorCallback, $email)) {
            throw new InvalidArgumentException('Invalid email address provided.');
        }

        // Simulate registration process
        return "User with email $email registered successfully.";
    }
}
