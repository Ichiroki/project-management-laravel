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
            $table->string('slug')->unique();
            $table->string('client', 100);
            $table->enum('status', ["Belum Dikerjakan", "Sedang Dikerjakan", "Menunggu Diterima", "Sudah Selesai"]);
            $table->integer('budget');
            $table->foreignId('project_manager_id')->constrained('users');
            $table->text('description');
            $table->timestamps();

            $table->index(['name', 'project_manager_id']);
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
