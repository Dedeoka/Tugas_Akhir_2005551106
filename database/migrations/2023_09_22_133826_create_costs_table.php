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
        Schema::create('tb_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cost_type_id')->constrained('m_cost_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('total_amount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costs');
    }
};
