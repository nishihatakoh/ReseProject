<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $text, $username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text,$username)
    {
        $this->text = $text;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('【Rese】管理事務局からのお知らせ')
        ->view('mails.mail')
        ->with([
            'text'=>$this->text,
            'username'=>$this->username,
        ]);
    }
}
