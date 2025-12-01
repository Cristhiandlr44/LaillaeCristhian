<?php

namespace App\Mail;

use App\Models\Gift;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GiftPurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public Gift $gift;
    public string $buyerName;
    public string $buyerEmail;
    public string $paymentMethod;

    /**
     * Create a new message instance.
     */
    public function __construct(Gift $gift, string $buyerName, string $buyerEmail, string $paymentMethod = 'pix')
    {
        $this->gift = $gift;
        $this->buyerName = $buyerName;
        $this->buyerEmail = $buyerEmail;
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '💝 Confirmação de Presente - Lailla & Cristhian',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.gift-purchase-confirmation',
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

