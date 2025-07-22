<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    private $array;

    protected function setUp(): void
    {
        $this->array = ['one'];
    }

    public function testArrayInitiallyHasOneItem(): void
    {
        $this->assertNotEmpty($this->array);

        $this->assertEquals('one', $this->array[0]);
    }

    public function testCanAddItemToArray(): void
    {
        $this->array[] = 'two';

        $this->assertEquals('two', $this->array[1]);
        $this->assertCount(2, $this->array);
    }
}
