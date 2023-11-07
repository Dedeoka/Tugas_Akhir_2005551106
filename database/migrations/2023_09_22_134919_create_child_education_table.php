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
        Schema::create('tb_child_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('children_id')->constrained('tb_childrens')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('school_name');
            $table->date('graduation_date');
            $table->string('certificate');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_education');
    }
};
