<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->string('name');
            $table->string('owner');
            $table->string('phone');
            $table->string('email');
            $table->string('web_site');
            $table->string('logo');
            $table->longText('description');
            $table->string('video');
            $table->string('catalog');
            $table->string('referent_name');
            $table->string('referent_email');
            $table->longText('description_info_company');
            $table->string('office_address');
            $table->string('operational_headquarters_address');
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
        Schema::dropIfExists('company');
    }
};
