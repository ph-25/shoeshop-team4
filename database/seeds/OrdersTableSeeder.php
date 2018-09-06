<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'id'=>1,
                'user_id'=>1,
                'user_name'=>"toan",
                'total'=>"",
                'date'=>"",
                'phone'=>"",
                'address'=>"Quang Nam",
                'status'=>""
            ],
            [
                'id'=>2,
                'user_id'=>1,
                'user_name'=>"toan",
                'total'=>"",
                'date'=>date_create(),
                'phone'=>"",
                'address'=>"Quang Nam",
                'status'=>""
            ]
    ]);
    }
}
