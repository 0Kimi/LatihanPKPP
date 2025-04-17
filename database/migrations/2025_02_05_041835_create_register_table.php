<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->date('tmula');
            $table->date('takhir');
            $table->text('nama')->nullable();
            $table->string('kategori')->nullable();
            $table->string('anjuran')->nullable();
            $table->string('penganjur')->nullable();
            $table->integer('tempoh')->nullable();
            $table->string('lokasi')->nullable();
            $table->decimal('ykos', 10, 2)->nullable();
            $table->decimal('pkos', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registers');
    }
};