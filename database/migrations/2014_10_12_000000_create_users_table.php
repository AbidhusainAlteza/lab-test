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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('contact_number')->nullable();
            $table->string('role',50)->default('user');
            $table->string('avatar')->nullable();
            $table->bigInteger('order_count')->default('0');
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
        Schema::dropIfExists('users');
    }
};
