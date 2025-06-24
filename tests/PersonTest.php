<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
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

    #[Test]
    public function full_name_is_first_name_when_no_surname(): void {}
}
