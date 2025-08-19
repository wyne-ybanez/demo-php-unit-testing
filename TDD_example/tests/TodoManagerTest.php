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
        $task = new Task('Buy Milk');

        $this->manager->addTask($task);

        $tasks = $this->manager->getTasks();

        $this->assertCount(1, $tasks);
        $this->assertSame($task, $tasks[0]);
    }

    public function testTaskIsRemovedFromList(): void
    {
        $task1 = new Task('Clean windows');
        $task2 = new Task('Make cake');

        $this->manager->addTask($task1);
        $this->manager->addTask($task2);

        // $this->assertNotSame($task1, $task2);

        $id = $task1->getId();

        $this->manager->deleteTask($id);

        $tasks = $this->manager->getTasks();

        // assert that the first task has been deleted, so check that task2 is the only task
        $this->assertCount(1, $tasks);
        $this->assertSame($task2, $tasks[0]);
    }
}
