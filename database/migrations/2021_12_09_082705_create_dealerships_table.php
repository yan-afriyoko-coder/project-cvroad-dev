<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealerships', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('dname');
            $table->string('slug');
            $table->string('address');
            $table->string('province');
            $table->string('phone');
            $table->string('website');
            $table->string('logo');
            $table->string('cover_photo');
            $table->string('slogan');
            $table->integer('group_id')->nullable();
            $table->integer('brand_id');
            $table->string('brand_other');
            $table->string('description');
            $table->string('vat_no');
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
        Schema::dropIfExists('dealerships');
    }
}
