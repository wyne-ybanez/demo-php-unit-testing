<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ValidatorTest extends TestCase
{
    // Sample static data
    public static function emailProvider(): array
    {
        return [
            'valid email'       => ['bart@example.com', true],
            'no @'              => ['bartexample.com', false],
            'invalid domain'    => ['user@invalid_domain', false],
            'empty email'       => ['', false],
        ];
    }

    // Test static method - call it statically
    #[DataProvider('emailProvider')]
    public function testEmailValidation(string $email, bool $expected): void
    {
        $this->assertSame($expected, Validator::isValidEmail($email));
    }
}
