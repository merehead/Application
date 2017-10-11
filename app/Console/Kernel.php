<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {

            $timeTask = Carbon::now();

            DB::table('mails')->where('time_to_send', '<', $timeTask)->where('status', '=', 'new')
                ->update(['status' => 'in_progress', 'time_when_sent' => $timeTask]);

            $mails = DB::table('mails')->select('id','email', 'subject', 'text')
                ->where('time_when_sent', $timeTask)->get();

            if (count($mails)) {
                foreach ($mails as $mail) {
                    Mail::send(config('settings.frontTheme') . '.emails.mail',
                        ['text'=>$mail->text],
                        function ($m) use ($mail) {
                            $m->to($mail->email)->subject($mail->subject);
                        });
//todo add mail error exception
                    DB::table('mails')->where('id', $mail->id)
                        ->update(['status' => 'sent']);

                }
            }
        })->everyMinute();
    }





    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
