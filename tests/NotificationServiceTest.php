<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class NotificationServiceTest extends TestCase
{
    // TEST Dependency
    public function testNotificationIsSent(): void
    {
        // stub = object clone
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

    // TEST Exception
    public function testSendThrowsException(): void
    {
        $mailer = $this->createStub(Mailer::class);

        // expecting this exception to be caught and replaced with out own test exception instead - business logic over technical
        $mailer->method('sendEmail')
            ->willThrowException(new RuntimeException('SMTP server down'));

        $service = new NotificationService($mailer);

        // expect 2 assertions
        $this->expectException(NotificationException::class);
        $this->expectExceptionMessage('Could not send notification');

        $service->sendNotification('dave@example.com', 'Hello');
    }
}
