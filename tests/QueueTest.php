<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

final class QueueTest extends TestCase
{
    public function testNewQueueIsEmpty(): Queue
    {
        $queue = new Queue; // Queue is already autoloaded

        $this->assertSame(0, $queue->getSize());

        return $queue;
    }

    #[Depends('testNewQueueIsEmpty')]
    public function testPushAddsItem(Queue $queue): Queue
    {
        $queue->push('Item');

        $this->assertSame(1, $queue->getSize());

        return $queue;
    }

    #[Depends('testPushAddsItem')]
    public function testPopRemovesAndReturnsItem(Queue $queue): void
    {
        // pop removes from array and returns the removed value
        $this->assertSame('Item', $queue->pop());

        $this->assertSame(0, $queue->getSize());
    }
}
