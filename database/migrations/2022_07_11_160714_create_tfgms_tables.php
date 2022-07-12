<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTfgmsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_types', function (Blueprint $table) {
            $table->increments('membership_id');
            $table->string('membership_type_name');
            $table->string('membership_period');
            $table->float('membership_amount');
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->date('birthday');
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->date('date_joined');
            $table->date('end_of_membership_date')->nullable();
            $table->integer('membership_id')->unsigned()->nullable();
            $table->foreign('membership_id')->references('membership_id')->on('membership_types')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('set null');
            $table->float('amount');
            $table->date('date_paid');
        });

        Schema::create('workouts', function (Blueprint $table) {
            $table->increments('workout_id');
            $table->string('workout_name');
            $table->string('workout_category');
            $table->string('workout_description');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('attendance', function (Blueprint $table) {
            $table->increments('attendace_id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('set null');
            $table->date('attendance_date');
            $table->date('date_inputted')->nullable();
        });

        Schema::create('workout_management', function (Blueprint $table) {
            $table->increments('workout_management_id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('set null');
            $table->integer('workout_id')->unsigned()->nullable();
            $table->foreign('workout_id')->references('workout_id')->on('workouts')->onUpdate('cascade')->onDelete('set null');
            $table->string('workout_schedule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('membership_types');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('workouts');
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('workout_management');

    }
}
