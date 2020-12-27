<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();
        $company->name = 'Webiggle.com';
        $company->email = 'info@webiggle.com';
        $company->account_id = 1;
        $company->created_by = 1;
        $company->status = '1';
        $company->save();
    }
}
