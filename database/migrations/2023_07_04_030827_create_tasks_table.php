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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('uom', 255);
            $table->decimal('volume', 8, 4);
            $table->decimal('cost', 12, 4);
            $table->decimal('subtotal_cost', 15, 4);
            $table->tinyInteger('priority')->unsigned()->default(0);
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('category_id')->unsigned()->nullable()->default(null);
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('category_id')->references('id')->on('task_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
