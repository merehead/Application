<?php

use Illuminate\Database\Seeder;

class servicesTables5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('behaviours')->insert(['name' => 'None']);
        DB::table('behaviours')->insert(['name' => 'Aggression']);
        DB::table('behaviours')->insert(['name' => 'Confusion']);
        DB::table('behaviours')->insert(['name' => 'Anxiety']);
        DB::table('behaviours')->insert(['name' => 'Agitation']);
        DB::table('behaviours')->insert(['name' => 'Violence']);
        DB::table('behaviours')->insert(['name' => 'Inappropriate sexual behaviour']);
        DB::table('behaviours')->insert(['name' => 'Antisocial behaviour']);
        DB::table('behaviours')->insert(['name' => 'other']);
    }
}
