<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReviewSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("Create VIEW `review` AS SELECT carer_id,count(carer_id) as creview,
                      CEILING(AVG(o.punctuality)) as avg_punctuality,
                      CEILING(AVG(o.friendliness)) as avg_friendliness,
                      CEILING(AVG(o.communication)) as avg_communication,
                      CEILING(AVG(o.performance)) as avg_performance,
                      CEILING(((AVG(o.punctuality) + AVG(o.friendliness) + AVG(o.communication) + AVG(o.performance)) /4)) as avg_total
                    FROM booking_overviews o
                    LEFT JOIN bookings b  ON o.booking_id = b.id
                    LEFT JOIN users c ON b.carer_id = c.id
                    group by 1");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS review');
    }
}
