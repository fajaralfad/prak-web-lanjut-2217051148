<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('user', function (Blueprint $table) {
        $table->id(); // Kolom id (bigint, auto increment, primary key)
        $table->string('nama'); // Kolom nama (varchar)
        $table->string('npm'); // Kolom npm (varchar)
        $table->unsignedBigInteger('kelas_id'); // Kolom kelas_id (foreign key)
        
        // Definisi foreign key
        $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');

        $table->timestamps(); // Kolom created_at dan updated_at
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
