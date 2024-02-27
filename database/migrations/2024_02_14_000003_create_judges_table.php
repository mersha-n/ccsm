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
        Schema::create('judges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judgeID');
            $table->string('name');
            $table->string('courtTyep');
            $table->string('Address');
            $table->string('state');
            $table->string('Emptype');
            $table->text('description');
            $table->unsignedBigInteger('court_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('judges');
    }
};
