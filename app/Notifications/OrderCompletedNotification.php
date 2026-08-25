<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCompletedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Order $order
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(
                'Stock Connect - Order Completed #' .
                $this->order->id
            )
            ->greeting(
                'Hello ' . $this->order->customer_name . ','
            )
            ->line(
                'Great news! Your Stock Connect order has been completed successfully.'
            )
            ->line(
                'Order #: ' . $this->order->id
            )
            ->line(
                'Livestock: ' .
                ($this->order->livestock->name ?? 'Livestock')
            )
            ->line(
                'Quantity: ' . $this->order->quantity
            )
            ->line(
                'Total: ₦' .
                number_format($this->order->total_price, 2)
            )
            ->line(
                'Order Status: Completed'
            )
            ->line(
                'Thank you for choosing Stock Connect. We hope to serve you again.'
            )
            ->action(
                'View My Order',
                route('orders.show', $this->order->id)
            )
            ->line(
                'We would appreciate your feedback about your experience.'
            );
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}