<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class TodoManagerTest extends TestCase
{
    public function testTaskListIsInitiallyEmpty(): void
    {
        $manager = new App\TodoManager;

        $tasks = $manager->getTasks();

        $this->assertCount(0, $tasks);
    }
}
