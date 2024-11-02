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
        Schema::create('pertanyaan_survei', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_survei');
            $table->text('pertanyaan');
            $table->enum('jenis_pertanyaan', ['teks', 'pilihan_ganda']);
            $table->string('opsi1')->nullable();
            $table->string('opsi2')->nullable();
            $table->string('opsi3')->nullable();
            $table->string('opsi4')->nullable();

            $table->foreign('id_survei')->references('id')->on('survei')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_survei');
    }
};
