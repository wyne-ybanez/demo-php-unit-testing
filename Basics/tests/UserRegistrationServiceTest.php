<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class UserRegistrationServiceTest extends TestCase
{
    public function testRegisterWithValidEmail(): void
    {
        $email = 'bart@example.com';

        $validator = $this->createMock(Validator::class);

        $validator
            ->expects($this->once())
            ->method('isValidEmailInstance')
            ->with($email)
            ->willReturn(true)
        ;

        $service = new UserRegistrationService($validator);

        $result = $service->register($email);

        $this->assertSame("User with email $email registered successfully.", $result);
    }
}
