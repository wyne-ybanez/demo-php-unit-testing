<?php

declare(strict_types=1);

use Mockery\Adapter\Phpunit\MockeryTestCase;

final class NotificationServiceTest extends MockeryTestCase
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

        $mailer->expects($this->once())
            ->method('sendEmail')
            ->with('dave@example.com', 'New Notification', 'Hi')
            ->willReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('dave@example.com', 'Hi'));
    }

    /**
    * Mockery test for the test above
    *
    * @return void
    */
    public function testMailerIsCalledCorrectlyOnceWithMockery(): void
    {
        $mailer = Mockery::mock(Mailer::class);

        $mailer->shouldReceive('sendEmail')
            ->once()
            ->with('dave@example.com', 'New Notification', 'Hi')
            ->andReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('dave@example.com', 'Hi'));
    }

    /**
    * Mockery spy
    *
    * We are using spies to very test double method calls after they happen.
    * All method calls on spy objects return null. A quicker way to test than creating mocks.
    *
    * @return void
    */
    public function testMailerIsCalledCorrectlyOnceWithMockerySpy(): void
    {
        $mailer = Mockery::spy(Mailer::class);

        $service = new NotificationService($mailer);

        $service->sendNotification('dave@example.com', 'Hello');

        $mailer->shouldHaveReceived('sendEmail')
               ->once()
               ->with('dave@example.com', 'New Notification', 'Hello');
    }
}
