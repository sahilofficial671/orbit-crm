<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Sahil Bhatia',
            'email'=>'sahilofficial671@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('sahil1234'),
            'role_id'=>'1',
            'status'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
