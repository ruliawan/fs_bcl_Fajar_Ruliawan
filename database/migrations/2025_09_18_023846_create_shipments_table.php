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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number')->unique();
            $table->date('shipping_date');
            $table->string('origin');
            $table->string('destination');
            $table->enum('status', ['tertunda', 'dalam perjalanan', 'telah tiba'])->default('tertunda');
            $table->text('item_details');
            $table->foreignId('fleet_id')->nullable()->constrained()->nullOnDelete(); 
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
