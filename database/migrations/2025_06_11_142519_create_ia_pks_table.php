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
        Schema::create('ia_pks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mou')->constrained('mou')->onDelete('cascade');
            $table->string('no_dokumen');
            $table->string('judul_dokumen');
            $table->string('jenis_dokumen');
            $table->string('jenis_kategori');
            $table->string('file_pks')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ia_pks');
    }
};
