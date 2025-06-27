<?php

declare(strict_types=1);

namespace App;

class Person
{
    private string $first_name;

    private string $surname;

    // Getters
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getFullName(): string
    {
        return trim($this->first_name . ' ' . ($this->surname ?? null));
    }

    // Setters
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }
}
