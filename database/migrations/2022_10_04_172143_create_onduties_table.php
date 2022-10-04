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
        Schema::create('onduties', function (Blueprint $table) {
            $table->id();
            $table->integer('weapon_id');
            $table->integer('supervisor_id');
            $table->integer('requested_by');
            $table->integer('approved_by');
            $table->string('duty_location');
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
        Schema::dropIfExists('onduties');
    }
};
