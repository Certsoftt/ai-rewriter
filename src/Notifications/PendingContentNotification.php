<?php
namespace AIRewriter\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PendingContentNotification extends Notification
{
    use Queueable;
    protected $content;
    public function __construct($content)
    {
        $this->content = $content;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Pending Crafted Content')
            ->line('There is new pending crafted content awaiting review.')
            ->action('Review Content', url('/admin/ai-rewriter/drafts'));
    }
}
