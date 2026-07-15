<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('full_name');

            $table->string('phone',20);

            $table->string('country')->default('Egypt');

            $table->string('city');

            $table->string('area')->nullable();

            $table->string('street');

            $table->string('building')->nullable();

            $table->string('floor')->nullable();

            $table->string('apartment')->nullable();

            $table->text('notes')->nullable();

            $table->boolean('is_default')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
