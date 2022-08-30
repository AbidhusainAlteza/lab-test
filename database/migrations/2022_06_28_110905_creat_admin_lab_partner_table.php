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
        //
        Schema::create('admin_lab_partner', function (Blueprint $table) {
            $table->id();
            $table->string('lab_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('lab_address')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('pos')->default('user');
            $table->string('lab_person')->nullable();
            $table->string('lab_license')->nullable();
            $table->enum('is_active',['0','1'])->default('1');
            $table->enum('is_delete',['0','1'])->default('0');
            $table->dateTime('added_date')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->dateTime('deleted_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
