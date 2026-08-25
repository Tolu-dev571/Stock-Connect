<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentRejectedNotification extends Notification
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
                'Stock Connect - Payment Verification Failed for Order #' .
                $this->order->id
            )
            ->greeting(
                'Hello ' . $this->order->customer_name . ','
            )
            ->line(
                'Unfortunately, we were unable to verify the payment submitted for your order.'
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
                'Payment Status: Failed'
            )
            ->line(
                'Please review your payment details or contact Stock Connect support if you believe this was an error.'
            )
            ->action(
                'View My Order',
                route('orders.show', $this->order->id)
            )
            ->line(
                'Thank you for choosing Stock Connect.'
            );
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}