<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\TodoManager;
use App\Task;

final class TaskTest extends TestCase
{
    public function testCanCreateATaskWithATitle(): void
    {
        $task = new Task('Buy Milk');

        $this->assertSame('Buy Milk', $task->getTitle());
    }

    public function testCannotCreateATaskWithAnEmptyTitle(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $task = new Task('');
    }

    public function testCannotCreateATaskWithATitleThatsJustSpaces(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $task = new Task('     ');
    }

    public function testEachTaskIsAssignedAUniqueId(): void
    {
        $task1 = new Task('Clean windows');
        $task2 = new Task('Make cake');

        $this->assertNotSame($task1->getId(), $task2->getId());
    }
}
