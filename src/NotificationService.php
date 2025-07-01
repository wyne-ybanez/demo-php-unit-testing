<?php

declare(strict_types=1);

class NotificationService
{
    public function sendNotification(string $recipient_email, string $message): bool
    {
        $mailer = new Mailer;

        $subject = 'New Notification';

        return $mailer->sendEmail($recipient_email, $subject, $message);
    }
}
