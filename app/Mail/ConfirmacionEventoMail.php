<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmacionEventoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $evento;//Ponerlo ay que tenemso que recoger los datos del evento.

    /**
     * Creamos una nueva jinstancia del mailable.
     */
    public function __construct($url , $evento)
    {
        $this->url = $url;
        $this->evento = $evento; //Pasamos ambos que tenemos por parametro.
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmacion Evento Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Confirmación de Evento')
            ->view('emails.confirmacion')
            ->with(['url' => $this->url,
                    'evento' => $this->evento]);//Pasar el evento.
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
