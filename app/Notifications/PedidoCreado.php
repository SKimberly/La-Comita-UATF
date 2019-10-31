<?php

namespace Lacomita\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lacomita\Models\Carrito;

class PedidoCreado extends Notification
{
    use Queueable;

    protected $carrito;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Carrito $carrito)
    {
        $this->carrito = $carrito;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Te enviaron un nuevo pedido de trabajo.')
                    ->line($notifiable->fullname . ", Se te envió un nuevo pedido de trabajo.")
                    ->action('VER PEDIDO', route('ver.pedido.pendiente', $this->carrito->id))
                    ->line('Gracias por leernos.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
