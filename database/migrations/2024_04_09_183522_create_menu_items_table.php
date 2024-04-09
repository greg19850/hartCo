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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('composition')->nullable();
            $table->float('price');
            $table->boolean('vegan')->default(false);

            $table->unsignedBigInteger('sub_menu_id');

            $table->foreign('sub_menu_id')
                ->references('id')
                ->on('sub_menus')
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
        Schema::dropIfExists('menu_items');
    }
};
