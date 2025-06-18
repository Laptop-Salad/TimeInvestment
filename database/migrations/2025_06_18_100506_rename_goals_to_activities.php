<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename table
        Schema::rename('goals', 'activities');

        // Rename goals_introduction to activities_introduction
        foreach (User::all() as $user) {
            $tips = $user->tips;
            $goals_introduction = $tips['goals_introduction'];
            unset($tips['goals_introduction']);
            $tips['activities_introduction'] = $goals_introduction;
            $user->tips = $tips;
            $user->save();
        }

        // Rename foreign key on investments
        Schema::table('investments', function (Blueprint $table) {
            $table->renameColumn('goal_id', 'activity_id');
            $table->renameIndex('investments_goal_id_foreign', 'investments_activity_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('activities', 'goals');
    }
};
