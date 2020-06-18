<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenceLattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absence_latters', function (Blueprint $table) {
            $table->id();
            $table->string('idemployee',8);
            $table->string('idemployeeapprove',8);
            $table->dateTime('fromhour');
            $table->dateTime('tohour');
            $table->tinyInteger('status')->default(0);
            $table->integet('countday');
            $table->tinyInteger('del_flg')->default(0);
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
        Schema::dropIfExists('absence_latters');
    }
}
