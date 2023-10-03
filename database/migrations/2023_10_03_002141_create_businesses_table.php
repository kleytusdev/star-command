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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 11)->unique();
            $table->string('reason_social', 100);
            $table->string('full_address', 100);
            $table->string('address', 100)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('condition', 50)->nullable();
            $table->string('ubigeous_sunat', 50)->nullable();
            $table->string('retention_agent', 50)->nullable();
            $table->json('ubigeous')->nullable();
            $table->json('annexes')->nullable();
            $table->foreignId('district_id')->nullable()->constrained('districts');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
