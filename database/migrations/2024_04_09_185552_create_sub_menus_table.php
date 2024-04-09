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
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->string('description')->nullable();
            $table->string('price')->nullable();

            $table->unsignedBigInteger('menu_id');

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
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
        Schema::dropIfExists('sub_menus');
    }
};
