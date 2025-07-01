<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

final class QueueTest extends TestCase
{
    private Queue $queue;

    protected function setUp(): void
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
        $this->queue->push('an item');

        $this->assertSame(1, $this->queue->getSize());
    }

    public function testPopRemovesAndReturnsItem(): void
    {
        // pop removes from array and returns the removed value
        $this->assertSame('an item', $this->queue->pop());

        $this->assertSame(0, $this->queue->getSize());
    }
}
