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
        Schema::create('lib_ahsp_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('uom', 50);
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('group_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('lib_ahsp_task_categories');
            $table->foreign('group_id')->references('id')->on('lib_ahsp_task_groups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lib_ahsp_tasks');
    }
};
