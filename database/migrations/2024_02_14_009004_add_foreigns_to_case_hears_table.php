<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('case_hears', function (Blueprint $table) {
            $table
                ->foreign('court_id')
                ->references('id')
                ->on('courts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('judge_id')
                ->references('id')
                ->on('judges')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('attorney_id')
                ->references('id')
                ->on('attorneys')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('case_charge_id')
                ->references('id')
                ->on('case_charges')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('wittness_id')
                ->references('id')
                ->on('wittnesses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_hears', function (Blueprint $table) {
            $table->dropForeign(['court_id']);
            $table->dropForeign(['judge_id']);
            $table->dropForeign(['attorney_id']);
            $table->dropForeign(['case_charge_id']);
            $table->dropForeign(['wittness_id']);
        });
    }
};
