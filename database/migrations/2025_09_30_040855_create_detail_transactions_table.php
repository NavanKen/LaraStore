<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('transactions_id')->constrained('transactions')->onDelete('cascade');
            $table->foreignUuid("products_id")->constrained('products')->onDelete('cascade');
            $table->bigInteger('price');
            $table->integer('qty');
            $table->bigInteger('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__transactions');
    }
};
