<?php

use Illuminate\Database\Seeder;

class Orders_DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_detail')->insrt([
            'id'=>1,
            'order_id'=>1,
            'product_id'=>1,
            'quantity'=>1,
            'price'=>"",
            'product_name'=>""
        ]);
    }
}
