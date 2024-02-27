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
        Schema::create('wittnesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('wittnessID');
            $table->string('name');
            $table->string('address');
            $table->string('state');
            $table->string('wittnessType');
            $table->text('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wittnesses');
    }
};
