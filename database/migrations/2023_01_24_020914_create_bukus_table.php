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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->text('gambar')->nullable();
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            $table->foreignId('penerbit_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->string('pengarang');
            $table->char('tahun_terbit',4);
            $table->integer('isbn');
            $table->integer('j_buku_baik');
            $table->integer('j_buku_rusak');
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
        Schema::dropIfExists('bukus');
    }
};
