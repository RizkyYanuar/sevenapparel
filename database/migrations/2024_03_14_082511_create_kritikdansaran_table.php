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
        Schema::create('kritikdansaran', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama');
            $table->text('kritik');
            $table->text('saran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kritikdansaran');
    }
};
