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
        Schema::create('child_academic_achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_education_id')->constrained('child_education')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->string('competition_level');
            $table->date('competition_date');
            $table->string('ranking');
            $table->string('prize_money');
            $table->string('prize_item');
            $table->string('description');
            $table->string('certificate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_academic_achievements');
    }
};
