<?php

declare(strict_types=1);

class User
{
    protected string $algorithm = 'sha256';

    private string $username;
    private string $password_hash;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password_hash = $this->hashPassword($password);
    }

    public function authenticatePassword(string $password): bool
    {
        // Additional user checks, e.g. is active
        // ...

        return $this->verifyPassword($password);
    }

    protected function hashPassword(string $password): string
    {
        // you would generally use `password_hash()` in a real world setting - but for this example we will just use `hash`
        return hash($this->algorithm, $password);
    }

    private function verifyPassword(string $password): bool
    {
        return $this->password_hash === $this->hashPassword($password);
    }
}
