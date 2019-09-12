<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefOrtuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_ortu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik', 40);
            $table->string('no_kk', 100)->nullable();
            $table->string('name', 150);
            $table->smallInteger('sex_id')->default(1);
            $table->string('pob', 100)->nullable();
            $table->date('dob');
            $table->string('phone', 30)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('address')->nullable();
            $table->Integer('user_id')->nullable();
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
        Schema::dropIfExists('ref_ortu');
    }
}
