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
        Schema::create('shops', function (Blueprint $table) {
            $table->comment('shops table');
            $table->id();
            $table->string('shop_name')->nullable()->comment('shop name');
            $table->integer('shop_number')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('shop_phone', 20)->nullable();
            $table->string('shop_email')->nullable();
            $table->string('tin_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
