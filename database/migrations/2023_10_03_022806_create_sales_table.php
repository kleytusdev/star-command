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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('discount')->nullable();
            $table->decimal('igv', 9, 2);
            $table->decimal('subtotal', 9, 2);
            $table->decimal('total', 9, 2);
            $table->string('status', 50);
            $table->string('payment_method', 50);
            $table->foreignId('client_id')->constrained('clients');
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
        Schema::dropIfExists('sales');
    }
};
