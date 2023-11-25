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
        Schema::create('child_healths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('children_id')->constrained('childrens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('disease_id')->constrained('diseases')->onDelete('cascade')->onUpdate('cascade');
            $table->string('medicine');
            $table->date('date_of_illness');
            $table->date('recovery_date')->nullable();
            $table->string('status');
            $table->string('payment_method');
            $table->string('drug_cost');
            $table->string('medical_check_cost');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_healths');
    }
};
