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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->nullable();
            $table->string('nik', 18)->nullable();
            $table->string('nip', 18)->nullable();
            $table->string('npm', 11)->nullable();
            $table->string('nama',50);
            $table->string('username',20);
            $table->enum('role', ['Admin','Staf','Ketua','Mahasiswa']);
            $table->string('email',70)->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
