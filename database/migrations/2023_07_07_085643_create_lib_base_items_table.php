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
        Schema::create('lib_base_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('uom', 255);
            $table->string('brand', 255);
            $table->string('specification', 255);
            $table->bigInteger('category_id')->unsigned()->nullable()->default(null);
            $table->foreign('category_id')->references('id')->on('lib_base_item_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lib_base_items');
    }
};
