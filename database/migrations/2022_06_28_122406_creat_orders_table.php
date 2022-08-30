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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number')->nullable();
            $table->bigInteger('buyer_id')->nullable();

            $table->string('price_subtotal')->nullable();

            $table->bigInteger('coupons_discount')->nullable();

            $table->string('price_total')->nullable();
            $table->string('status')->nullable();
            $table->string('prescription')->nullable();
            $table->string('prescription_img')->nullable();
            $table->string('prescription_date')->nullable();
            $table->string('prescription_time')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('razorpay_payment_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('refer_doctor')->nullable();

            $table->bigInteger('blood_collection_boy_id')->nullable();
            $table->string('collection_boy_status')->nullable();

            $table->bigInteger('lab_partner_id')->nullable();

            $table->string('lab_partner_status')->nullable();
            $table->string('lab_partner_report')->nullable();
            $table->string('current_status')->nullable();

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
