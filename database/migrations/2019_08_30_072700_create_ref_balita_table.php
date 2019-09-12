<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefBalitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_balita', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nika', 40)->nullable();
            $table->string('no_rm', 100);
            $table->string('name', 150);
            $table->smallInteger('sex_id')->default(1);
            $table->string('pob', 100)->nullable();
            $table->date('dob');
            $table->Integer('birth_weight');
            $table->Integer('birth_height');
            $table->Integer('head_circ');
            $table->enum('status', ['normal', 'cesar'])->default('normal');
            $table->smallInteger('ortu_id');
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
        Schema::dropIfExists('ref_balita');
    }
}
