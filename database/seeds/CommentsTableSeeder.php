<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
           'id'=>1,
           'content'=>"Giay dep, giao hang nhanh",
           'parent_id'=>1,
            'user_id'=>2,
            'product_id'=>3
        ]);
    }
}
