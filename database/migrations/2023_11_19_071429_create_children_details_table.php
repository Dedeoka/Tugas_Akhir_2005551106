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
        Schema::create('children_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('children_id')->constrained('childrens')->onDelete('cascade')->onUpdate('cascade');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('reason_for_leaving');
            $table->string('guardian_name');
            $table->string('guardian_relationship');
            $table->string('guardian_address');
            $table->string('guardian_phone_number');
            $table->string('guardian_email');
            $table->string('guardian_identity_card');
            $table->string('birth_certificate');
            $table->string('family_card');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children_details');
    }
};
