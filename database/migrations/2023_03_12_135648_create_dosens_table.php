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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nip',18)->unique();
            $table->string('nama_dos',50);
            $table->string('slug');
            $table->string('jabatan',20)->nullable();
            $table->string('gol_regu',8)->nullable();
            $table->string('jenis_kel',10);
            $table->string('prodi',30);
            $table->string('email',70);
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
        Schema::dropIfExists('dosens');
    }
};
