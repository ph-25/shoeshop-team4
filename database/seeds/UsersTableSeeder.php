<?php

use Illuminate\Database\Seeder;
use App\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $users = [
        'phone'=>'Integer',
    ];
    public function run()
    {
        DB::table('users')->insert([
            ['id'=>1,
                'name'=>"admin",
                'email'=>"admin@gmail.com",
                'password'=>"0123456789",
                'phone'=>"01223539732",
                'address'=>"Quang Nam",//
                'user_type'=>1],
            ['id'=>2,
                'name'=>"toan",
                'email'=>"toan@gmail.com",
                'password'=>"123456",
                'phone'=>"01223539732",
                'address'=>"Quang Nam",
                'user_type'=>0],
            ['id'=>3,
                'name'=>"anh",
                'email'=>"anh@gmail.com",
                'password'=>"123456",
                'phone'=>"01223539732",
                'address'=>"Quang Ngai",
                'user_type'=>0],
        ]);
//        $faker = Faker\Factory::create();
//        foreach (range(1, 5) as $index) {
//            Users::create([
//                'name' => $faker->name,
//                'email' => $faker->email,
//                'password' => '123456',
//                'phone' => $faker->phoneNumber,
//                'address' => $faker->address
//            ]);
//        }
    }
}
