<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('department_name', 50)->nullable()->index();
            $table->string('employees', 10)->nullable()->index();
            $table->string('employees_after17', 10)->nullable()->index();
            $table->string('fasting', 10)->nullable();

            $table->string('tea', 10)->nullable()->index();
            $table->string('employees_second', 10)->nullable();
            $table->string('employees_second_after5', 10)->nullable()->index();

            $table->string('fasting_second', 10)->nullable();
            $table->string('email', 191)->nullable()->unique()->index();

            $table->string('tea_second', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // composiet indexen
        Schema::table('customers', function (Blueprint $table) {
            $table->index(['department_name', 'employees']);
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
    }
}
