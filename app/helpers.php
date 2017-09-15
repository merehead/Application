<?php
/**
 * Created by PhpStorm.
 * User: AntonShelehvost
 * Date: 15.09.2017
 * Time: 00:18
 */

if (! function_exists('words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string  $value
     * @param  int     $words
     * @param  string  $end
     * @return string
     */
    function words($value, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}