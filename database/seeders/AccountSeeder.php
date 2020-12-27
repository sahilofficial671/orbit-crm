<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = new Account();
        $account->name = 'Webiggle Digital Agency';
        $account->domain = 'webiggle.com';
        $account->pinned = '0';
        $account->created_by = 1;
        $account->status = '1';
        $account->save();
    }
}
