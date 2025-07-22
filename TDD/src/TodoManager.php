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
}
