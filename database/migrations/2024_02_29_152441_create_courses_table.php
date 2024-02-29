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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->json('description');
            $table->decimal('price');
            $table->decimal('discount')->nullable();
            $table->tinyInteger('discount_type')->nullable();
            $table->integer('duration');
            $table->tinyInteger('duration_type');
            $table->foreignId('major_id')->constrained('majors')->cascadeOnDelete();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
