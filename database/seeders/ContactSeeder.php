<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = new Contact();
        $contact->name = 'Webiggle.com';
        $contact->email = 'info@webiggle.com';
        $contact->account_id = 1;
        $contact->status = '1';
        $contact->save();
    }
}
