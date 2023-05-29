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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->float('value');
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('clients')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('reciver_id');
            $table->foreign('reciver_id')->references('id')->on('clients')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
