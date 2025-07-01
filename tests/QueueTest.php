<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase
{
    private Queue $queue;

    protected function setUp(): void // before each test method when the test is run
    {
        $this->queue = new Queue;
    }

    /*
    This runs after each test method - usually for cleaning up.
    This isn't really practical.
    You'd only do this if a variable uses up too much memory
    or if you were allocating external resources such as files.
    */
    protected function tearDown(): void
    {
        // unset($this->queue);
    }

    public function testNewQueueIsEmpty(): void
    {
        $this->assertSame(0, $this->queue->getSize());
    }

    public function testPushAddsItem(): void
    {
        $this->queue->push('item');

        $this->assertSame(1, $this->queue->getSize());
    }

    public function testPopRemovesAndReturnsItem(): void
    {
        $this->queue->push('item');

        // pop removes from array and returns the removed value
        $this->assertSame('item', $this->queue->pop());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue(): void
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertSame('first', $this->queue->shift());
    }

    // Exception Tests
    public function testPopThrowsExceptionWhenQueueIsEmpty(): void
    {
        $this->expectException(\UnderflowException::class);
        $this->expectExceptionMessage('Queue is empty');

        $this->queue->pop();
    }

    public function testShiftThrowsExceptionWhenQueueIsEmpty(): void
    {
        $this->expectException(\UnderflowException::class);
        $this->expectExceptionMessage('Queue is empty');

        $this->queue->shift();
    }
}
