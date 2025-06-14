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
        Schema::create('return_on_investments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('coin_id')->unsigned();
            $table->foreign('coin_id')
                ->references('id')
                ->on('coins');

            $table->string('name');
            $table->string('description')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_on_investments');
    }
};
