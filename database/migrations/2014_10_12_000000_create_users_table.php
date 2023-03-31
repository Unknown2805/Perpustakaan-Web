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
            $table->string('kode_user',25);
            $table->char('nis',20)->nullable();
            $table->string('fullname',50);
            $table->string('username',50)->unique();
            $table->text('password');
            $table->text('alamat')->nullable();
            $table->string('kelas',50)->nullable();
            $table->string('verif',50)->nullable();
            $table->enum('role',['admin','user']);
            $table->date('join_date');
            $table->date('terakhir_login')->nullable();
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
