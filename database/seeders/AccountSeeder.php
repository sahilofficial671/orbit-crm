<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Account();
        $company->name = 'Webiggle Digital Agency';
        $company->domain = 'webiggle.com';
        $company->pinned = '0';
        $company->created_by = 1;
        $company->status = '1';
        $company->save();
    }
}
