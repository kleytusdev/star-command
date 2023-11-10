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
        Schema::create('entry_guides', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->integer('quantity');
            $table->decimal('unit_price', 9, 2);
            $table->decimal('total', 9, 2);
            $table->foreignId('guide_id')->constrained('guides');
            $table->foreignId('product_id')->constrained('products');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry_guides');
    }
};
