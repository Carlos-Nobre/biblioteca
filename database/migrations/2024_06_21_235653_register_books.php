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
        Schema::create('books', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('autor');
            $table->string('titulo');
            $table->string('sub_titulo');
            $table->string('edição');
            $table->string('editora');
            $table->date('date_publish');
            $table->string('imagem')->default('');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

    }


    public function down(): void
    {
        //
    }
};
