<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class UserRegistrationServiceTest extends TestCase
{
    public function testRegisterWithValidEmail(): void
    {
        $email = 'bart@example.com';

        // Use a callback function because UserRegistrationService expects a Closure.
        $stub = function (string $email) {
            echo "$email is valid.";
            return true;
        };

        $service = new UserRegistrationService($stub);

        $this->expectOutputString("$email is valid.");

        $result = $service->register($email);

        $this->assertSame("User with email $email registered successfully.", $result);
    }

    public function testRegisterWithInvalidEmail(): void
    {
        // Use a callback function because UserRegistrationService expects a Closure.
        $stub = function (string $email) {
            return false;
        };

        $service = new UserRegistrationService($stub);

        $this->expectException(InvalidArgumentException::class);

        $service->register('invalid email');
    }
}
