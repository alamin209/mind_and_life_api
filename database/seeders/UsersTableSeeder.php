<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'username'           => 'pennyyau88',
            'email'              => 'penny@gmail.com',
            'profile_pic'        =>'demo.png',
            'password'           => bcrypt('12345678'),
            'sex'                => 'Male',
            'industry_id'        => '1',
            'salary_range_id'    => 1,

        ];

        User::create($user);
    }
}




