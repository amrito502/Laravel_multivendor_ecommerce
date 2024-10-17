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
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->id();
            $table->string('qty',50);
            $table->string('sale_price',50);
            // Foreign keys
            $table->unsignedBigInteger('user_id');
            // Relationships
            $table->foreign('user_id')->references('id')->on('users')
            ->restrictOnDelete()->cascadeOnUpdate();
             // Foreign keys
             $table->unsignedBigInteger('customer_id');
             // Relationships
             $table->foreign('customer_id')->references('id')->on('customers')
             ->restrictOnDelete()->cascadeOnUpdate();
              // Foreign keys
              $table->unsignedBigInteger('invoice_id');
              // Relationships
              $table->foreign('invoice_id')->references('id')->on('invoices')
              ->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_products');
    }
};
