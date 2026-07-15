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

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('name', 200);

            $table->string('slug', 220)->unique();

            $table->longText('description');

            $table->string('sku', 100)->unique();

            $table->decimal('price', 12, 2);

            $table->decimal('sale_price', 12, 2)->nullable();

            $table->integer('stock')->default(0);

            $table->string('featured_image')->nullable();

            $table->double('weight')->default(0);

            $table->boolean('featured')->default(false);

            $table->boolean('status')->default(true);

            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();

            $table->index('name');
            $table->index('sku');
            $table->index('price');
            $table->index('status');
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
