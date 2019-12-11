<?php

namespace Invoice\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Invoice\User;

class Users extends Mailable
{
    use Queueable, SerializesModels;
    public $users;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $users)
    {
        dd($users);
        $this->users = $users;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('mails.users');
    }
}
