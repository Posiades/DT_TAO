<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class conTract extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $name;
    public $phone;
    public $title;
    public $content;
    /**
     * Create a new message instance.
     */
    public function __construct($email, $name, $phone, $title, $content)
    {
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Phản Hồi Từ Khách Hàng',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail/contract',
            with: [
                'email' => $this->email,
                'name' => $this->name,
                'phone' => $this->phone,
                'title' => $this->title,
                'content' => $this->content,
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
