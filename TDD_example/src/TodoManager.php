<?php

declare(strict_types=1);

namespace App;

class TodoManager
{
    private array $tasks = [];

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
    }

    public function deleteTask(int $id): void
    {
        // 'use' makes the specified $id variable of the outer scope available inside the closure.
        // array_filter here also preserves existing array keys, so will need to re-index.

        $this->tasks = array_filter($this->tasks, function (Task $task) use ($id) {
            return $task->getId() !== $id;
        });

        // Re-index the array
        $this->tasks = array_values($this->tasks);
    }
}
