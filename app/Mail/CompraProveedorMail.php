<?php

namespace App\Mail;

use App\Models\Compra;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompraProveedorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $compra;

    /**
     * Create a new message instance.
     */
    public function __construct(Compra $compra)
    {
        $this->compra = $compra;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Orden de compra nro.'.$this->compra->id,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.compra_proveedor',
            with: [
                'compra' => $this->compra,
                'detalles' => $this->compra->detalles,
                'proveedor' => $this->compra->proveedor
            ],
        );
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
