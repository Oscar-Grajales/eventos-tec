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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('status')->default('unconfirmed'); # El estado por defecto será 'no confirmado'
            $table->float('price')->unsigned();
            $table->string('reason', 500)->nullable();
            $table->timestamp('starts_at')->nullable(); # Fecha de inicio
            $table->timestamp('ends_at')->nullable(); # Fecha de finalización
            $table->bigInteger('confirmed_by')->unsigned(); # Para el ID del gerente que confirma el evento

            $table->bigInteger('user_id')->unsigned(); # Para el ID del usuario que cree el evento
            $table->bigInteger('pack_id')->unsigned(); # Para el ID del evento que es base del evento

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pack_id')->references('id')->on('packs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
