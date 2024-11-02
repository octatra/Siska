<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jawaban_survei', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hasil_survei');
            $table->string('jawaban_survei');

            $table->foreign('id_hasil_survei')->references('id')->on('hasil_survei')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_survei');
    }
};
