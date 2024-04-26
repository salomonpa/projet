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
        Schema::create('annuaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('responsable');
            $table->integer('activite');
            $table->string('effectif');
            $table->string('mail');
            $table->string('langued_affaire');
            $table->integer('tel');
            $table->date('date_existence');
            $table->string('ville');
            $table->string('adresse');
            $table->string('pays');
            $table->string('statut_juridique');
            $table->string('existence_officielle');
           $table->string('photo');
           $table->unsignedBigInteger('categories_id')->nullable();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuaires');
    }
};
