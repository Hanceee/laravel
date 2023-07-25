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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_id');
            $table->date('transaction_date');
            $table->text('transaction_details');
            $table->decimal('price', 10, 2);
            $table->integer('quality_rating')->nullable();
            $table->integer('delivery_rating')->nullable();
            $table->integer('pricing_rating')->nullable();
            $table->integer('customer_service_rating')->nullable();
            $table->integer('reliability_rating')->nullable();
            $table->text('comment')->nullable();
            $table->string('remarks')->nullable();
            $table->string('user_id');
            $table->boolean('archived')->default(false);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
