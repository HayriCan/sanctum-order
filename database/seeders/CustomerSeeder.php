<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'id'=> 1,
                'name'=> 'Türker Jöntürk',
                'since'=> '2014-06-28',
                'revenue'=> '492.12',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 2,
                'name'=> 'Kaptan Devopuz',
                'since'=> '2015-01-15',
                'revenue'=> '1505.95',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 3,
                'name'=> 'İsa Sonuyumaz',
                'since'=> '2016-02-11',
                'revenue'=> '0.00',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
