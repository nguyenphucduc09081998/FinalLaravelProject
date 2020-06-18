<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('idemployee',8);
            $table->string('name',255);
            $table->date('birthday');
            $table->string('homwtown',255);
            $table->string('sex',25);
            $table->string('phone',15);
            $table->integer('idposition');
            $table->integer('iddepartment');
            $table->integer('idsalary');
            $table->tinyInteger('del_glg')->default(0);
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
        Schema::dropIfExists('employees');
    }
}
