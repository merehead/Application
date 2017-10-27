<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fee_name')->default('');
            $table->float('carer_rate')->default('0');
            $table->boolean('type_flat')->default(0);
            $table->boolean('type_percent')->default(0);
            $table->float('amount')->default(0);
            $table->float('purchaser_rate')->default(0);
            $table->timestamps();
        });
        DB::table('fees')->insert(
            [   'fee_name' => 'Day Time',
                'carer_rate' => '10',
                'type_flat'=>1,
                'type_percent'=>0,
                'amount'=>2,
                'purchaser_rate'=>12,
            ]
        );
        DB::table('fees')->insert(
            [   'fee_name' => 'Night Time',
                'carer_rate' => '12',
                'type_flat'=>1,
                'type_percent'=>0,
                'amount'=>2.40,
                'purchaser_rate'=>14.40,
            ]
        );
        DB::table('fees')->insert(
            [   'fee_name' => 'Holiday',
                'carer_rate' => '15',
                'type_flat'=>1,
                'type_percent'=>0,
                'amount'=>3,
                'purchaser_rate'=>18,
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}
