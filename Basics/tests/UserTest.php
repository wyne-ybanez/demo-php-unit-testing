<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testCorrectPasswordAuthenticatesSuccessfully(): void
    {
        $user = new User('Dave', 'sample_password');

        $this->assertTrue($user->authenticatePassword('sample_password'));
    }

    public function testIncorrectPasswordFailsAuthentication(): void
    {
        $user = new User('Cian', 'cian_secret_password');

        $this->assertFalse($user->authenticatePassword('asdasdasda'));
    }

    // A way to test for protected methods is to create a child class and change the method visibility in that child class.
    public function testPasswordHashIsMinimumLength(): void
    {
        $user = new UserChild('Ben', 'ben_secret_password');

        $hash = $user->hashPassword('ben_secret_password');

        $this->assertGreaterThanOrEqual(60, strlen($hash));
    }
}
