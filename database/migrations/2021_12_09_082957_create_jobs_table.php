<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('dealership_id');
            $table->string('brand_id');
            $table->string('salary_range');
            $table->string('title');
            $table->string('duties');
            $table->string('qualification');
            $table->string('number_of_vacancy');
            $table->string('years_experience');
            $table->string('slug');
            $table->text('description');
            $table->integer('category_id');
            $table->string('position');
            $table->string('province');
            $table->string('address');
            $table->string('type');
            $table->date('last_date');
            $table->integer('status');
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
        Schema::dropIfExists('jobs');
    }
}
