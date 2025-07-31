<?php

declare(strict_types=1);

// This is one way of testing protected methods
// However, this way also pollutes the test code
class UserChild extends User
{
    public function hashPassword(string $password): string
    {
        return parent::hashPassword($password);
    }
}
