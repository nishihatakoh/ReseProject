<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Console\Commands\ReserveMail;

class TodayMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $reserve;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reserve)
    {
        $this->reserve = $reserve;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('本日の予約確認のご連絡です')
        ->view('mails.Reservemail')
        ->with([
            'shop_name' =>$this->reserve->shop->shop_name,
            'reserve_date' =>$this->reserve->date,
            'reserve_time' =>$this->reserve->time,
            'reserve_number' =>$this->reserve->number,
        ]);
    }
}
