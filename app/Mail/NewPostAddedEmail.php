<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\Types\This;

class NewPostAddedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $website;

    public $title;

    public $description;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $website, string $title, string $description)
    {
        $this->website = $website;
        $this->$title = $title;
        $this->$description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): NewPostAddedEmail
    {
        return $this->markdown('emails.posts.new')->subject("New Post from " . $this->website);
    }
}
