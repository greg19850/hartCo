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
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('day_of_week')->nullable();
            $table->string('order')->nullable();
            $table->string('closed')->nullable();

            $table->unsignedBigInteger('week_day_id');

            $table->foreign('week_day_id')
                ->references('id')
                ->on('week_days')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->softDeletes();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_hours');
    }
};
