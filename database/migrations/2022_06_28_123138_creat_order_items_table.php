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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('buyer_id')->nullable();
            $table->bigInteger('item_id')->nullable();

            $table->string('item_type')->nullable();
            $table->string('item_title')->nullable();
            $table->string('item_price')->nullable();
            $table->string('order_status')->nullable();
            $table->string('prescription')->nullable();
            $table->string('prescription_img')->nullable();
            $table->string('prescription_date')->nullable();
            $table->string('prescription_time')->nullable();
            $table->string('is_approved')->nullable()->default('1');

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
