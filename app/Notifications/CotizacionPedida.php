<?php

namespace Lacomita\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lacomita\Models\Cotizacion;

class CotizacionPedida extends Notification
{
    use Queueable;

    protected $cotizacion;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Cotizacion $cotizacion)
    {
        $this->cotizacion = $cotizacion;
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
                    ->action('VER PEDIDO', route('cotizaciones.show', $this->cotizacion->id))
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
