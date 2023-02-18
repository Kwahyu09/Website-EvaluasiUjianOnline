<?php

use App\Models\Ujian;
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
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ujian_id');
            $table->foreignId('mahasiswa_id');
            $table->foreignId('soal_id');
            $table->string('nama_evaluasi');
            $table->string('jawaban');
            $table->string('tingkat_soal');
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
        Schema::dropIfExists('evaluasis');
    }
};
