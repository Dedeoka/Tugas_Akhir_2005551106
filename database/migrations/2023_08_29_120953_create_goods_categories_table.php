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
        Schema::create('goods_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity');
            $table->integer('stock');
            $table->string('unit');
            $table->boolean('is_hide')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_categories');
    }
};
