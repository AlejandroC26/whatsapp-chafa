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
        Schema::create('mensaje', function (Blueprint $table) {
            $table->id();
            $table->string('cont_mensaje');
            $table->enum('est_mensaje',["visto","recibido"])
            ->default('recibido');
            $table->datetime('hora_visto')->nullable();
            $table->string('archivos')->nullable();
            $table->foreignId('fk_usuario')
            ->constrained('users')
            ->cascadeOnDelete();
            $table->foreignId('fk_receptor')
            ->constrained('users')
            ->cascadeOnDelete();
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
        Schema::dropIfExists('mensaje');
    }
};
