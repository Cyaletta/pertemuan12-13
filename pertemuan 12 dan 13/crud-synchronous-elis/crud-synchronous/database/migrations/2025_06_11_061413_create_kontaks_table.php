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
        Schema::create('kontaks', function (Blueprint $table) {// yang berarti menyuruh untuk membuatkan tabel kontaks di DB, sesuai isi kolom dibawah ini.
            $table->id(); // seting id biarkan seperti ini karena otomatis AI
            $table->string('nama'); //tipe string membuat varchar(255)
            $table->text('alamat'); // tipe data text membuat text
            $table->bigInteger('no_hp')->length(13);// tipe data int max 13
            $table->timestamps();// waktu saat pengisian
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
