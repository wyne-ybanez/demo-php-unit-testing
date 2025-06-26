# PHPUnit - Unit Testing

To unit test code.

Must exist in the project folder of where the test is planned to occur.

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

## Dependancies

PHPUnit version `12.2`

Your version might be earlier or later, as long as the functionality remains and is familiar enough for you to configure/fix, then you should be okay.

&nbsp;

## How to use

In the project folder - this is assuming you have made an alias for phpunit. Assuming you have defined your test.

This is already applying the configurations within `phpunit.xml`.

To use all tests under `tests/` - run: `phpunit`

### Run folders

Run all the tests in the `tests/` folder: `phpunit tests`

### List all tests

Run: `phpunit --list-tests`

This is good for debugging. It helps you check which tests have been picked up by phpunit.

### Filter for a specific test

Long way: `phpunit --filter FunctionsTest::testAddTwoPositiveIntegers`

Short way: `phpunit --filter testAddTwoPositiveIntegers`

### Wildcards

Wildcards are handy for running multiple tests at a time. To activate all test files - run: `phpunit tests/*Test.php*`

### Without `phpunit.xml.dist` config - Useful Commands

Highlights test with colours:
`phpunit tests/<file.php> --bootstrap tests/bootstrap.php --colors`

Highlights test with colours and stop the test on the first failure it encounters, also prints the name of the failed test:
`phpunit tests/<file.php> --bootstrap tests/bootstrap.php --colors --stop-on-failure`

Testdox for test report, useful as a base for documentation (helps if your test names should be verbose):
`phpunit tests/<file.php> --bootstrap tests/bootstrap.php --colors --testdox`

### Incomplete tests

Run: `phpunit --display-incomplete`

If you have a test you thats not asserting anything: `phpunit --dont-report-useless-tests`.

&nbsp;

## Test Suites

You can list the total amount of suites you've created through. This is all configured in the xml file.

Run: `phpunit --list-suites`

### Running a Test Suite

You can choose what test suite to run, for example run the default test suite: `phpunit --testsuite default`

### Composing a Test Suite using using XML configuration

Here is an example of an xml test suite. You can read more about these here: https://docs.phpunit.de/en/12.2/organizing-tests.html#composing-a-test-suite-using-xml-configuration

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/11.4/phpunit.xsd"
         bootstrap="tests/bootstrap.php">
    <testsuites>
        <testsuite name="unit">
            <directory>tests/unit</directory>
        </testsuite>

        <testsuite name="integration">
            <directory>tests/integration</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

&nbsp;

## Registering custom functions

To get a function recognised as a test. It must fall under the PHPunit test attribute or begin with `test`.

Place this at the top of your file: `use PHPUnit\Framework\Attributes\Test;`

You can then register the function for test uses like this:

```php
// to help for test registry
use PHPUnit\Framework\Attributes\Test;

#[Test]
public function full_name_is_first_name_when_no_surname(): void {}
```

&nbsp;

## Tips

- Just make one assertion per test. This makes it easier to maintain.
- Make the names of the tests as verbose as you can.
- Match the name of the test class to the class you are planning to test.
