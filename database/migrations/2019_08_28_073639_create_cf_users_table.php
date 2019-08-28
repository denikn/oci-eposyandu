<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCfUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cf_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname', 150);
            $table->string('username', 80);
            $table->text('password');
            $table->enum('role', ['admin', 'kapus', 'petugas', 'kader', 'ortu']);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('cf_users');
    }
}
