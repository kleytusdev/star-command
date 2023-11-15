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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('document_type', 50);
            $table->string('document_number', 50);
            $table->string('name', 50);
            $table->string('full_name', 50)->nullable();
            $table->string('paternal_surname', 50)->nullable();
            $table->string('maternal_surname', 50)->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
