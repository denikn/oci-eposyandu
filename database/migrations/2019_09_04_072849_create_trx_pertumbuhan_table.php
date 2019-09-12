<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrxPertumbuhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_pertumbuhan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('visit_date');
            $table->smallInteger('posyandu_id');
            $table->smallInteger('balita_id');
            $table->Integer('weight');
            $table->Integer('height');
            $table->Integer('head_circ');
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
        Schema::dropIfExists('trx_pertumbuhan');
    }
}
