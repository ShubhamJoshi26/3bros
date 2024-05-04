<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailToEndUser extends Mailable
{
    use Queueable, SerializesModels;

    public $senderMessage = '';
    public $name = '';
    public $url = '';
    public $mailData ='';
    public $sub ='';
    /**
    * Create a new message instance.
    */
    public function __construct( $name, $senderMessage,$mailData,$sub )
    {
    $this->name = $name;
    $this->senderMessage = $senderMessage;
    $this->mailData = $mailData;
    $this->sub = $sub;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'reply_email',
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
