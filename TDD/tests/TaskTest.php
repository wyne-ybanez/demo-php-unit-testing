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
}
