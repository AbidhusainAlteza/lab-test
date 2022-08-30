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
        Schema::create('user_patients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();

            $table->string('patient_name')->nullable();
            $table->string('mobile_no')->nullable();

            $table->dateTime('date_of_birth')->nullable();

            $table->string('relationship')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();

            $table->longText('medicine_condition')->nullable();
            $table->longText('allegies_reactions')->nullable();
            $table->longText('medications')->nullable();

            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();

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
