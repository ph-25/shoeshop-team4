<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            ['id'=>1,'name'=>'Giày Tây'],
            ['id'=>2,'name'=>'Giày Sneaker'],
            ['id'=>3,'name'=>'Giày Lười'],
            ['id'=>4,'name'=>'Giày Slip-On'],
            ['id'=>5,'name'=>'Giày Cao Gót'],
        ]);
    }
}
