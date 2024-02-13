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
        Schema::create('objetos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('parent_id')->nullable($valor = true);
            $table->string('name', 50);
            $table->string('type', 50);
            $table->integer('blob_id')->nullable($valor = true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objetos');
    }
};
