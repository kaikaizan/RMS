<?php

namespace Database\Seeders;

use App\Models\AdminAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [
                'id' => '1',

               'name'=>'Admin',

               'id_number' => '12345',

               'email'=>'admin@gmail.com',

               'position'=>'Employee',

                'is_admin'=>'1',

               'password'=> bcrypt('12345678'),

            ],

            [
                'id' => '2',

               'name'=>'User',

               'id_number' => '1234',

               'email'=>'user@gmail.com',

               'position'=>'Employee',

                'is_admin'=>'0',

               'password'=> bcrypt('12345678'),

            ],

        ];

  

        foreach ($user as $key => $value) {

            AdminAccount::create($value);

        }
    }
}
