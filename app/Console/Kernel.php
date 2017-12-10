<?php

namespace App\Console;

use App\Appointment;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SmsTools;

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

        //Sending sms about appointments
        $schedule->call(function () {
            $res = DB::select("SELECT a.id FROM appointments a 
                                JOIN bookings b ON a.booking_id = b.id
                              WHERE UNIX_TIMESTAMP(STR_TO_DATE(CONCAT(DATE_FORMAT(a.date_start, '%Y-%m-%d'), ' ', a.time_from), \"%Y-%m-%d %H.%i\")) - UNIX_TIMESTAMP(NOW()) <= 3600 AND a.reminder_sent = 0 AND b.status_id = 5 AND a.status_id < 3");
            if($res){
                foreach ($res[0] as $appointmentId){
                    $appointment = Appointment::find($appointmentId);
                    $carerProfile = $appointment->booking->bookingCarerProfile;
                    $serviceUserProfile = $appointment->booking->bookingServiceUser;
                    $purchaserProfile = $appointment->booking->bookingPurchaserProfile;

                    //send to carer
                    $message = 'Hi, '.$carerProfile->full_name.'. We just wanted to remind you that you have an appointment with '.$serviceUserProfile->full_name.' at '.$appointment->formatted_time_from.' today.';
                    SmsTools::sendSmsToCarer($message, $carerProfile);

                    if($serviceUserProfile->hasMobile()){
                        //end to service user
                        $message = 'Hi, '.$serviceUserProfile->full_name.'. We just wanted to remind you that '.$carerProfile->full_name.' will be visiting you at '.$appointment->formatted_time_from.' today.';
                        SmsTools::sendSmsToServiceUser($message, $serviceUserProfile);
                    } else {
                        //send to purchaser
                        $message = 'Hi, '.$purchaserProfile->full_name.'. We just wanted to remind you that '.$carerProfile->full_name.' will be visiting '.$serviceUserProfile->full_name.' at '.$appointment->formatted_time_from.' today.';
                        SmsTools::sendSmsToPurchaser($message, $purchaserProfile);
                    }

                    $appointment->reminder_sent = true;
                    $appointment->save();
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
