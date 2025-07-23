<?php

declare(strict_types=1);

namespace App;

class Task
{
    private string $title;

    function __construct(string $title)
    {
        $this->title = $title;

        if (trim($title) === '') {
            throw new \InvalidArgumentException('Title cannot be empty');
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
