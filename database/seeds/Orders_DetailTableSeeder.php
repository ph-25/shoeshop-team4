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
        DB::table('orders_detail')->insert([
        [   'id'=>1,
            'order_id'=>1,
            'product_id'=>2,
            'quantity'=>1,
            'price'=>"835000",
            'product_name'=>"Toan"],
        [   'id'=>2,
            'order_id'=>2,
            'product_id'=>3,
            'quantity'=>1,
            'price'=>"335000",
            'product_name'=>"Anh"]
        ]);
    }
}
