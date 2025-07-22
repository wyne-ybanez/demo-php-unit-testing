<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class FunctionsTest extends TestCase
{
    // This acts as a data provider for out methods
    public static function additionProvider(): array
    {
        return [
            'two positive integers' => [2, 3, 5],
            'two negative integers' => [-2, -3, -5],
            'positive and negative integers' => [3, -2, 1],
            'adding zero' => [3, 0, 3]
        ];
    }

    #[DataProvider('additionProvider')] // Sets up the data provider for this method
    public function testAddIntegers(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, addIntegers($a, $b));
    }

    public function testAddingIsCommutative(): void
    {
        $this->assertSame(addIntegers(3, 2), addIntegers(2, 3));
    }
}
