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
        Schema::create('case_hears', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CaseID');
            $table->string('casename');
            $table->string('fileNumber');
            $table->string('address');
            $table->string('state');
            $table->string('location');
            $table->dateTime('caseStartDate');
            $table->text('description');
            $table->unsignedBigInteger('court_id');
            $table->unsignedBigInteger('judge_id');
            $table->unsignedBigInteger('attorney_id');
            $table->unsignedBigInteger('case_charge_id');
            $table->unsignedBigInteger('wittness_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_hears');
    }
};
