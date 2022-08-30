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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer_id')->nullable();
            $table->bigInteger('item_id')->nullable();

            $table->string('item_type')->nullable();
            $table->string('title')->nullable();
            $table->string('img')->nullable();
            $table->string('description')->nullable();

            $table->bigInteger('item_price')->nullable();
            $table->bigInteger('item_discount')->nullable();
            $table->bigInteger('item_price_total')->nullable();
            $table->bigInteger('coupon_discount')->nullable();

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
