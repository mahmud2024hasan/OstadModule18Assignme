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
            $table->id(); // id: Primary Key
            $table->integer('product_id')->unique(); // product_id: Unique, Required
            $table->string('name'); // name: Required
            $table->text('description')->nullable(); // description: Optional
            $table->decimal('price', 10, 2); // price: Required
            $table->integer('stock')->nullable(); // stock: Optional
            $table->string('image'); // image: Required
            $table->timestamps(); // created_at, updated_at
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
