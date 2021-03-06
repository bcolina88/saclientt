<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_sucursales', function (Blueprint $table) {
            
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sucursal_id');

            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDetete('cascade');

            $table->foreign('sucursal_id')
                  ->references('id')
                  ->on('sucursales')
                  ->onUpdate('cascade')
                  ->onDetete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_sucursales');
    }
};
