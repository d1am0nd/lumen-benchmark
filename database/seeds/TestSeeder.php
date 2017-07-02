<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $a = [
            [
                'string' => 'DATABASE TEST 1 (ONE): This is test data from database, string field',
                'content' => 'DATABASE TEST 1 (ONE): This is test data from database, content field',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'string' => 'DATABASE TEST 2 (TWO): This is test data from database, string field',
                'content' => 'DATABASE TEST 2 (TWO): This is test data from database, content field',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'string' => 'DATABASE TEST 3 (THREE): This is test data from database, string field',
                'content' => 'DATABASE TEST 3 (THREE): This is test data from database, content field',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'string' => 'DATABASE TEST 4 (FOUR): This is test data from database, string field',
                'content' => 'DATABASE TEST 4 (FOUR): This is test data from database, content field',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'string' => 'DATABASE TEST 5 (FIVE): This is test data from database, string field',
                'content' => 'DATABASE TEST 5 (FIVE): This is test data from database, content field',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        app('db')->table('tests')->insert($a);
    }
}
