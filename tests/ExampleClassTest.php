<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ExampleClassTest extends TestCase
{
    /*
        Assertion Methods

        Methods used to check for expected value
     */
    public function testTwoValuesAreTheSame(): void
    {
        $this->assertSame(2, 2); // checks if these two values are the same, will succeed
    }
}
