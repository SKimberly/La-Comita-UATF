<?php

namespace Lacomita\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lacomita\User;

class MensajeEnviado extends Notification
{
    protected $mensaje;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
        //aqui defino q estoy enviando la notificacion via base de datos y E-mail
        return ['database','mail'];
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
                    ->greeting('¡Hola!')
                    ->subject('Mensaje recibido desde el sitio web de Sport La Comita')
                    ->line('Has recibido un mensaje.')
                    ->action('Click aqui para ver el mensaje', route('mensajes.show', $this->mensaje->id))
                    ->line('Gracias por utilizar nuestra aplicación.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //return $this->mensaje->toArray();
        //aqui envio 2 llaves link y text que va a recibir en la vista index de mensajes
        return [
            'link' => route('mensajes.show', $this->mensaje->id),
            'text' => "Has recibido un mensaje de " . $this->mensaje->msjenviado->fullname
        ];
    }
}
