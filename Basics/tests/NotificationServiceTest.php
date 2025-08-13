<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class NotificationServiceTest extends TestCase
{
    /**
     * testNotificationIsSent
     *
     * test dependency injection works
     *
     * @return void
     */
    public function testNotificationIsSent(): void
    {
        // stub = object clone - test for state
        // create stub of mailer
        $mailer = $this->createStub(Mailer::class);

        // allows us to test the notification without sending emails
        // 1 assertion
        $mailer->method('sendEmail')->willReturn(true);

        $service = new NotificationService($mailer);

        // IF we use a stub here and don't manipulate the method on the stub, this will fail
        $this->assertTrue($service->sendNotification('dave@example.com', 'Hello'));
    }

    /**
     * testSendThrowsException
     *
     * @return void
     */
    public function testSendThrowsException(): void
    {
        $mailer = $this->createStub(Mailer::class);

        // expecting this exception to be caught and replaced with our own test exception instead - business logic over technical
        $mailer->method('sendEmail')
            ->willThrowException(new RuntimeException('SMTP server down'));

        $service = new NotificationService($mailer);

        // expect 2 assertions
        $this->expectException(NotificationException::class);
        $this->expectExceptionMessage('Could not send notification');

        $service->sendNotification('dave@example.com', 'Hello');
    }

    /**
     * testMailerIsCalledCorrectly
     *
     * create mock for Mailer class
     * check if it is definitely called
     * make sure it is only called once
     *
     * @return void
     */
    public function testMailerIsCalledCorrectlyOnce(): void
    {
        $mailer = $this->createMock(Mailer::class);

        // expect 5 assertions
        $mailer->expects($this->once())
            ->method('sendEmail')
            ->with('dave@example.com', 'New Notification', 'Hi')
            ->willReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('dave@example.com', 'Hi'));
    }
}
