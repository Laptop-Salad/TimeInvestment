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
        Schema::rename('coins', 'investments');

        Schema::table('return_on_investments', function (Blueprint $table) {
            $table->renameColumn('coin_id', 'investment_id');
            $table->renameIndex('return_on_investments_coin_id_foreign', 'return_on_investments_investment_id_foreign');
        });

        Schema::table('investments', function (Blueprint $table) {
            $table->renameIndex('coins_user_id_foreign', 'investments_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('investments', 'coins');

        Schema::table('return_on_investments', function (Blueprint $table) {
            $table->renameColumn('investment_id', 'coin_id');
            $table->renameIndex('return_on_investments_investment_id_foreign', 'return_on_investments_coin_id_foreign');
        });

        Schema::table('coins', function (Blueprint $table) {
            $table->renameIndex('investments_user_id_foreign', 'coins_user_id_foreign');
        });
    }
};
