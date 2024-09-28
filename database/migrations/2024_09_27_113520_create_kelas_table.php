<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()  {
    Schema::create('kelas', function (Blueprint $table) {
        $table->id(); // Kolom id (bigint, auto increment, primary key)
        $table->string('nama_kelas'); // Kolom nama_kelas (varchar)
        $table->timestamps(); // Kolom created_at dan updated_at
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
    Schema::dropIfExists('kelas');
    }

};
