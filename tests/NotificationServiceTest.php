<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class NotificationServiceTest extends TestCase
{
    // replacing a dependency with a test object is called stubbing
    // stubs expect a class
    // stub = object clone
    public function testNotificationIsSent(): void
    {
        // create stub of mailer
        // $mailer = new Mailer;
        $mailer = $this->createStub(Mailer::class);

        // manipulate mimicked object method and set what it will return
        $mailer->method('sendEmail')->willReturn(true);

        // Dependency injection
        $service = new NotificationService($mailer);

        // IF we use a stub here and don't manipulate the method on the stub, this will fail
        // because the service is dependent on the Mailer object, but the stub overrides this
        $this->assertTrue($service->sendNotification('dave@example.com', 'Hello'));
    }
}
