<?php

declare(strict_types=1);

use Mockery\Adapter\Phpunit\MockeryTestCase;
use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;

/**
 * Mockery with Alias
 *
 * To avoid errors, we will need to run in a separate process.
 *
 * @return void
*/

#[RunClassInSeparateProcess]
final class CustomerTest extends MockeryTestCase
{
    public function testCanCreateCustomerWithValidEmail(): void
    {
        $mock = Mockery::mock('alias:Validator');

        $email = 'bart@example.com';

        $mock->shouldReceive('isValidEmail')
             ->once()
             ->with($email)
             ->andReturn(true);

        $customer = new Customer($email); // customer needs an email to validate in constructor
    }

    public function testCannotCreateCustomerWithInvalidEmail(): void
    {
        $mock = Mockery::mock('alias:Validator');

        $email = 'daveexample.com';

        $mock->shouldReceive('isValidEmail')
             ->once()
             ->with($email)
             ->andReturn(false);

        $this->expectException(InvalidArgumentException::class);

        $customer = new Customer($email);
    }
}