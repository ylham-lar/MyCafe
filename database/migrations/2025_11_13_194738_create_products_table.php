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
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('name_ru')->nullable();
            $table->string('name_tm')->nullable();
            $table->unsignedInteger('price')->default(0);
            $table->string('code');
            $table->text('description')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_tm');
            $table->string('image')->nullable();
            $table->integer('discount_percent')->default(0);
            $table->float('weight')->default(0);
            $table->timestamps();
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
