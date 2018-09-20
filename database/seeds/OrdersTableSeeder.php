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
                'user_id'=>2,
                'user_name'=>"toan",
                'total'=>835000,
                'date'=>date_create(),
                'phone'=>"0123456789",
                'address'=>"Quang Nam",
                'status'=>0
            ],
            [
                'id'=>2,
                'user_id'=>3,
                'user_name'=>'anh',
                'total'=>"335000",
                'date'=>date_create(),
                'phone'=>"0123456789",
                'address'=>"Quang Nam",
                'status'=>1
            ]
    ]);
    }
}
