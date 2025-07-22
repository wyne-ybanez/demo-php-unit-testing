<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\TodoManager;
use App\Task;

final class TodoManagerTest extends TestCase
{
    private TodoManager $manager;

    protected function setUp(): void
    {
        $this->manager = new TodoManager;
    }

    public function testTaskListIsInitiallyEmpty(): void
    {
        $tasks = $this->manager->getTasks();

        $this->assertCount(0, $tasks);
    }

    public function testTaskIsAddedToList(): void
    {
        $task = new Task;

        $this->manager->addTask($task);

        $tasks = $this->manager->getTasks();

        $this->assertCount(1, $tasks);
        $this->assertSame($task, $tasks[0]);
    }
}
