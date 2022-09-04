<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\reserve;
use App\Mail\TodayMail;



class ReserveMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReserveMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約当日のメール';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        $reserves = Reserve::where('date',$today)->get();
        foreach($reserves as $reserve){
            return Mail::to($reserve->user->email)->send(new TodayMail($reserve));
        }
    }
}
