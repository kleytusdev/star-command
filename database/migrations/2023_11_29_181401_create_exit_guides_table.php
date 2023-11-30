<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exit_guides', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->integer('current_stock');
            $table->integer('prev_stock');
            $table->integer('quantity');
            $table->decimal('total', 9, 2);
            $table->foreignId('sale_id')->constrained('sales');
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_guides');
    }
};
