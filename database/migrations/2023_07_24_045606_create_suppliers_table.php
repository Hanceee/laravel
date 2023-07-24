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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('representative_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('address')->nullable();
            $table->string('office_contact')->nullable();
            $table->string('email')->nullable();
            $table->string('business_permit_number')->nullable();
            $table->string('tin')->nullable();
            $table->string('philgeps_registration_number')->nullable();
            $table->decimal('average_rating', 4, 2)->default(0.00);
            $table->string('category_id')->nullable();
            $table->date('date_last_rating')->nullable();
            $table->integer('total_ratings')->default(0);
            $table->string('supplier_website')->nullable();
            $table->string('supplier_status')->nullable();
            $table->text('supplier_notes')->nullable();
            $table->boolean('archived')->default(false);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
