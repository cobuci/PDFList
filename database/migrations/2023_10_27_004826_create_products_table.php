<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable()->default(null);
            $table->string('code')->nullable()->default(null);
            $table->integer('min_amount')->nullable()->default(null);
            $table->decimal('price_sale', 10, 2)->nullable()->default(null);
            $table->decimal('price_site', 10, 2)->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->integer('position')->nullable()->default(null);
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
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
