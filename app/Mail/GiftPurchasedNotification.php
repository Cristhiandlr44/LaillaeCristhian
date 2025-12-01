<?php

namespace App\Mail;

use App\Models\Gift;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GiftPurchasedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public Gift $gift;
    public string $buyerName;
    public string $paymentMethod;
    public ?string $buyerMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(Gift $gift, string $buyerName, string $paymentMethod = 'pix', ?string $buyerMessage = null)
    {
        $this->gift = $gift;
        $this->buyerName = $buyerName;
        $this->paymentMethod = $paymentMethod;
        $this->buyerMessage = $buyerMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎁 Novo Presente Recebido! - ' . $this->gift->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.gift-purchased-notification',
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

