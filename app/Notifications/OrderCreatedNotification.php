<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
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
            ->subject('Stock Connect - Order Received #' . $this->order->id)
            ->greeting('Hello ' . $this->order->customer_name . ',')
            ->line('Your order has been received successfully.')
            ->line('Order #: ' . $this->order->id)
            ->line('Livestock: ' . $this->order->livestock->name)
            ->line('Quantity: ' . $this->order->quantity)
            ->line('Total: ₦' . number_format($this->order->total_price, 2))
            ->line('Order Status: ' . ucfirst($this->order->status))
            ->action(
                'View My Order',
                route('orders.show', $this->order->id)
            )
            ->line('Thank you for choosing Stock Connect.');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}