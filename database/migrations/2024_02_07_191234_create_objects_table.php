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
        Schema::create('objects', function (Blueprint $table) {
            $table->id()->autoIncrement;
            $table->integer('parent_id')->nullable();
            $table->string('name',100);
            $table->string('type',100);
            $table->foreignId('blob_id')
            ->references('id')
            ->on('blobs')->cascadeOnDelete;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objects');
    }
};
