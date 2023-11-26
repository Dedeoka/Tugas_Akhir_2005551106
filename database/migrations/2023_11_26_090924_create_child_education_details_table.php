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
        Schema::create('child_education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_education_id')->constrained('child_education')->onDelete('cascade')->onUpdate('cascade');
            $table->string('guardian_name');
            $table->string('guardian_address');
            $table->string('guardian_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_education_details');
    }
};
