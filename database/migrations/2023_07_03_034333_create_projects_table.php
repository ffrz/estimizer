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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('address', 255)->default('');
            $table->string('owner', 100)->default('');
            $table->year('year');
            $table->decimal('cost')->default(0.);
            $table->decimal('fee')->default(0.);
            $table->decimal('tax')->default(0.);
            $table->text('notes')->default('');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
