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
        Schema::create('tb_donate_goods_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donate_goods_id')->constrained('tb_donate_goods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('goods_category_id')->constrained('m_goods_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('quantity');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donate_goods_details');
    }
};
