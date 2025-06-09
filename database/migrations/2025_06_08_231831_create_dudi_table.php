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
        Schema::create('dudi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_admin')->constrained('admin')->onDelete('cascade');
            $table->foreignId('id_koordinator')->constrained('koordinator')->onDelete('cascade');
            $table->string('nama_dudi');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->enum('status', ['request', 'accepted', 'rejected']);
            $table->string('nama_contact_person')->nullable();
            $table->string('jabatan_contact_person')->nullable();
            $table->string('no_telp_contact_person')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dudi');
    }
};
