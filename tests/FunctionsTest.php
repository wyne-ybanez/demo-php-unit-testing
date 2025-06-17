<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// Test functions in `lib/`
require dirname(__DIR__) . '/lib/functions.php';

final class FunctionsTest extends TestCase
{
    public function testAddTwoPositiveIntegers(): void
    {
        $this->assertSame(6, addIntegers(2, 3));
    }

    public function testAddTwoNegativeIntegers(): void
    {
        $this->assertSame(-5, addIntegers(-2, -3));
    }

    public function testAddPositiveAndNegativeIntegers(): void
    {
        $this->assertSame(1, addIntegers(3, -2));
    }

    public function testAddZeroToInteger(): void
    {
        $this->assertSame(3, addIntegers(3, 0));
    }

    public function testAddingIsCommutative(): void
    {
        $this->assertSame(addIntegers(3, 2), addIntegers(2, 3));
    }
}
