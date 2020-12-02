<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 50)->unique();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('phone')->nullable();
            $table->unsignedBigInteger('landline')->nullable();
            $table->string('fax')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('postcode')->nullable();
            $table->string('state_code', 2)->nullable();
            $table->string('country_code', 2)->nullable();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('created_by');
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
