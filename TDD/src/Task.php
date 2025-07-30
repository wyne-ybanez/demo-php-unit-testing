<?php

declare(strict_types=1);

namespace App;

class Task
{
    private string $title;
    private int $id;
    private static int $next_id = 1;

    function __construct(string $title)
    {
        if (trim($title) === '') {
            throw new \InvalidArgumentException('Title cannot be empty');
        }

        $this->title = $title;

        $this->id = self::$next_id++;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
