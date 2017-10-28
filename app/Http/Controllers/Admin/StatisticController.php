<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;

class StatisticController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(){
        $bookingsStatistic = DB::select('SELECT
              SUM(a.price) as price,
              COUNT(a.price) as amount,
              b.status_id
            FROM bookings b
              JOIN (SELECT booking_id, SUM(price_for_purchaser) as price FROM appointments GROUP BY booking_id) AS a ON a.booking_id = b.id
            WHERE b.status_id  IN (2, 5, 7)
            GROUP BY b.status_id
            ORDER BY b.status_id');
        $this->vars['bookingsStatistic'] = $bookingsStatistic;

        $bookingsStatisticTotal = DB::select('SELECT
              SUM(a.price) as price,
              COUNT(a.price) as amount
            FROM bookings b
              JOIN (SELECT booking_id, SUM(price_for_purchaser) as price FROM appointments GROUP BY booking_id) AS a ON a.booking_id = b.id
            WHERE b.status_id  IN (2, 5, 7)');
        $this->vars['bookingsStatisticTotal'] = $bookingsStatisticTotal;

        $usersStatistic['purchasers_amount'] = DB::select("SELECT COUNT(p.id) as count
            FROM  purchasers_profiles p WHERE p.registration_status = 'completed'")[0]->count;
        $usersStatistic['carers_amount'] = DB::select("SELECT COUNT(p.id) as count
             FROM carers_profiles p WHERE  p.registration_status = 'completed'")[0]->count;
        $usersStatistic['service_users_profiles'] = DB::select("SELECT COUNT(p.id) as count
             FROM service_users_profiles p WHERE  p.registration_status = 'completed'")[0]->count;
        $usersStatistic['incomplete_purchasers_amount'] = DB::select("SELECT COUNT(p.id) as count
            FROM  purchasers_profiles p WHERE p.registration_status != 'completed'")[0]->count;
        $usersStatistic['incomplete_carers_amount'] = DB::select("SELECT COUNT(p.id) as count
             FROM carers_profiles p WHERE  p.registration_status != 'completed'")[0]->count;
        $usersStatistic['incomplete_service_users_profiles'] = DB::select("SELECT COUNT(p.id) as count
             FROM service_users_profiles p WHERE  p.registration_status != 'completed'")[0]->count;
        $this->vars['usersStatistic'] = $usersStatistic;

        $mostActiveCarers = DB::select('SELECT u.id, p.first_name, p.family_name,
                              (
                                SELECT COUNT(a.id)
                                FROM appointments a
                                JOIN bookings b ON a.booking_id = b.id
                                JOIN carers_profiles p ON b.carer_id = p.id
                                WHERE p.id = u.id AND a.status_id = 4  AND UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(a.date_start) <= 604800
                              ) as appointments_per_last_week,
                              (
                                SELECT COUNT(a.id)
                                FROM appointments a
                                  JOIN bookings b ON a.booking_id = b.id
                                  JOIN carers_profiles p ON b.carer_id = p.id
                                WHERE p.id = u.id AND a.status_id = 4  AND UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(a.date_start) <= 2592000
                              ) as appointments_per_last_month
                              FROM users u
                              JOIN carers_profiles p ON p.id = u.id
                            ORDER BY appointments_per_last_week DESC LIMIT 5');
        $this->vars['mostActiveCarers'] = $mostActiveCarers;

        $this->content = view(config('settings.theme').'.statistic')->with($this->vars)->render();

        return $this->renderOutput();
    }
}
