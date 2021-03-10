<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newCommentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $publication;
    public $user;
    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($publication, $user, $comment)
    {
        $this->publication = $publication;
        $this->user = $user;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newComment')
            ->subject('Your Publication received a new Comment');
    }
}
