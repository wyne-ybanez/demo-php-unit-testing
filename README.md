# PHPUnit - Unit Testing

Must exist in the project folder of where it was installed

&nbsp;

## Install Manually

Link: https://phar.phpunit.de/

Pick the `phpunit.phar` folder for installation.

&nbsp;

## Install with Composer

This is my preferred installation.

`composer require --dev phpunit/phpunit`

`vendor/bin/phpunit --version`

&nbsp;

## Setup PHPUnit

Make PHPUnit executable:

`chmod +x <folder>/phpunit.phar`

Bear in mind, you’ll need to add PHP unit on every project.

Check PHPUnit existence and version:

`<folder>/phpunit.phar --version`

or if installed via composer:

`vendor/bin/phpunit --version`

or if you're like me, you made an alias of the above:

`alias phpunit=vendor/bin/phpunit`

`phpunit —-version`

&nbsp;

## How to use

In the project folder - this is assuming you have made an alias for phpunit. Assuming you have defined your test.

Run: `phpunit <folder>/<file.php>`

---

If you want to see the results of your test highlighted with colours.

Run: `phpunit <folder>/<file.php> --colors`

---

If you want to see the results of your test highlighted with colours and stop the test on the first failure it encounters.

Run: `phpunit <folder>/<file.php> --colors --stop-on-failure`

&nbsp;

## Tips

- Just make one assertion per test. This makes it easier to maintain.
- Make the names of the tests as verbose as you can.
- Match the name of the test class to the class you are planning to test.
