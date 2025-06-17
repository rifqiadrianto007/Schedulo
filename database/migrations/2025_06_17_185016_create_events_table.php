<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelaksana');
            $table->string('nim_nip');
            $table->string('nama_kegiatan');
            $table->string('jenis_kegiatan');
            $table->string('narasumber_pemateri');
            $table->date('tanggal_pelaksanaan');
            $table->string('tempat_kegiatan');
            $table->string('link_zoom')->nullable();
            $table->string('biaya_pendaftaran')->default('0');
            $table->date('tenggat_pendaftaran');
            $table->string('link_form');
            $table->integer('kuota');
            $table->text('deskripsi');
            $table->string('poster');
            $table->string('contact', 20);
            $table->string('status')->default('diajukan');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
