<?php
namespace AIRewriter\Services;

use Illuminate\Support\Facades\Notification;

class NotificationService
{
    public function notifyPendingContent($users, $content)
    {
        // Send notification to users about new pending crafted content
        Notification::send($users, new \AIRewriter\Notifications\PendingContentNotification($content));
    }
}
