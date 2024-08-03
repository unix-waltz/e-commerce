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
        Schema::create('products', function (Blueprint $t) {
            $t->id();
            $t->uuid('slug');
            $t->string('product_name');
            $t->enum('status', ['active', 'nonactive'])->default('active');
            $t->string('product_category');
            $t->text('product_description');
            $t->string('product_img')->nullable();
            $t->integer('product_quantity');
            $t->integer('product_price');
            $t->timestamps();
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
