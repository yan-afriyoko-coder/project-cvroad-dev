<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('avatar')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('profile_status')->nullable();
            $table->string('race')->nullable();
            $table->integer('dealer_experience')->nullable();

            $table->softDeletes()->nullable();
            $table->integer('title_id')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('title')->nullable();
            $table->string('identification_number')->nullable();
            $table->string('slug')->nullable();
            $table->text('bio')->nullable();
            $table->text('education')->nullable();

            $table->string('title_job1')->nullable();
            $table->string('employer_job1')->nullable();
            $table->string('date_job1')->nullable();

            $table->string('title_job2')->nullable();
            $table->string('employer_job2')->nullable();
            $table->string('date_job2')->nullable();

            $table->string('driver_liscence')->nullable();

            $table->string('first_language')->nullable();
            $table->string('fl1')->nullable();
            $table->string('second_language')->nullable();
            $table->string('fl2')->nullable();
            $table->string('third_language')->nullable();
            $table->string('fl3')->nullable();
            $table->string('fourth_language')->nullable();
            $table->string('fl4')->nullable();


            $table->string('salary_range')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('province')->nullable();

            $table->string('group_id')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();

            $table->string('software')->nullable();
            $table->string('cover_letter')->nullable();
            $table->string('cv')->nullable();
            $table->string('certificates')->nullable();
            $table->string('payslips')->nullable();
            $table->string('other_documents')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
