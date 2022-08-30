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
        Schema::create('admin_blood_collection_boy', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('contact')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('pincode')->default('0');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('area')->nullable();
            $table->string('driving_licence_no')->nullable();
            $table->string('driving_licence_img')->nullable();
            $table->string('c_bo_document_type')->nullable();
            $table->string('c_bo_document_number')->nullable();
            $table->string('c_bo_document_img')->nullable();
            $table->string('relative_phone_number')->nullable();
            $table->string('relative_name')->nullable();
            $table->string('relative_do_type')->nullable();
            $table->string('relative_do_number')->nullable();
            $table->string('relative_do_img')->nullable();

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
