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
        Schema::create('black_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_event')->constrained('events')->cascadeOnDelete();
            $table->string('name');
            $table->date('date_start');
            $table->date('price_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('black_lists');
    }
};
