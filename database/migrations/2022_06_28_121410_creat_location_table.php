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
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('area')->nullable();
            $table->string('circlename')->nullable();
            $table->string('districtname')->nullable();
            $table->string('divisionname')->nullable();
            $table->string('pincode')->nullable();
            $table->string('regionnname')->nullable();
            $table->string('statename')->nullable();
            $table->string('taluka')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_delete')->default(0);
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
