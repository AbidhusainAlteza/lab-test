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
        Schema::create('vendor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('name',200)->nullable();
            $table->string('email',200)->nullable();
            $table->bigInteger('contact_number')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address',200)->nullable();
            $table->string('city',200)->nullable();
            $table->string('state',200)->nullable();
            $table->string('zip',200)->nullable();
            $table->string('commission',200)->nullable();

            $table->string('laboratory_name')->nullable();
            $table->string('laboratory_address')->nullable();
            $table->string('lecom_number')->nullable();
            $table->string('laboratory_document_type')->nullable();
            $table->string('laboratory_document_number')->nullable();
            $table->string('laboratory_document_img')->nullable();

            $table->enum('is_active',['0','1'])->default('1');
            $table->enum('is_delete',['0','1'])->default('0');
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
        //
    }
};
