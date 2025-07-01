<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class NotificationServiceTest extends TestCase
{
    public function testNotificationIsSent(): void
    {
        $service = new NotificationService;

        $this->assertTrue($service->sendNotification('dave@example.com', 'Hello'));
    }
}
