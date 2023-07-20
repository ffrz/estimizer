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
        Schema::create('lib_ahsp_task_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->decimal('coefficient', 8, 4, true)->required();
            $table->foreign('task_id')->references('id')->on('lib_ahsp_tasks');
            $table->foreign('item_id')->references('id')->on('lib_base_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lib_ahsp_task_details');
    }
};
