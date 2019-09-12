<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCfAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cf_accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->smallInteger('level');
            $table->smallInteger('parent_id')->nullable();
            $table->string('url', 150);
            $table->smallInteger('sort');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('cf_accesses');
    }
}
