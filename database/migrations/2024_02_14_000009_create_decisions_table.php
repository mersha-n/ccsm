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
        Schema::create('decisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('decisionDate');
            $table->string('Decisiontype');
            $table->text('Description');
            $table->unsignedBigInteger('case_hear_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decisions');
    }
};
