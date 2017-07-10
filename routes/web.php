<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization');

$app->get('/', function () use ($app) {
    return 'Hello';
});

$app->get('api/first_db_result', function () use ($app) {
    return response()->json(app('db')->table('tests')->first());
});

$app->get('api/all_db_results', function () use ($app) {
    return response()->json(app('db')->table('tests')->get());
});

$app->get('api/string_result', function () use ($app) {
    return response("Lorem ipsum");
});

$app->get('api/qsort_result', function () {
    $numbers = json_decode(file_get_contents(storage_path('numbers.json')));

    $start = microtime(true);
    quick_sort($numbers);
    $elapsed = microtime(true) - $start;

    return "Sorted " . count($numbers) . " time sorting: " . number_format($elapsed * 1000, 4) . "ms";
});

// http://andrewbaxter.net/quicksort.php
function quick_sort($array)
{
    // find array size
    $length = count($array);

    // base case test, if array of length 0 then just return array to caller
    if($length <= 1){
        return $array;
    }
    else{

        // select an item to act as our pivot point, since list is unsorted first position is easiest
        $pivot = $array[0];

        // declare our two arrays to act as partitions
        $left = $right = array();

        // loop and compare each item in the array to the pivot value, place item in appropriate partition
        for($i = 1; $i < count($array); $i++)
        {
            if($array[$i] < $pivot){
                $left[] = $array[$i];
            }
            else{
                $right[] = $array[$i];
            }
        }

        // use recursion to now sort the left and right lists
        return array_merge(quick_sort($left), array($pivot), quick_sort($right));
    }
}
