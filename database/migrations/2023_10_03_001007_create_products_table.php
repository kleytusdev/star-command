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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 150);
            $table->decimal('unit_price', 9, 2);
            $table->string('brand', 50);
            $table->string('model', 50);
            $table->string('status', 50);
            $table->integer('stock');
            $table->string('qr_code', 255);
            $table->foreignId('warehouse_id')->constrained('warehouses');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
