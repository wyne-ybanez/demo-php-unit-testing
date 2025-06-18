<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Person;

final class PersonTest extends TestCase
{
    public function testGetFullNameIsFirstNameAndSurname(): void
    {
        $person = new Person;

        $person->setFirstName('Teresa');
        $person->setSurname('Green');

        $this->assertSame('Teresa Green', $person->getFullName());
    }
}
