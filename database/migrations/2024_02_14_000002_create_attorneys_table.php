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
        Schema::create('attorneys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attorneyID');
            $table->string('Name');
            $table->string('courtType');
            $table->string('Address');
            $table->string('State');
            $table->string('EmpType');
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
        Schema::dropIfExists('attorneys');
    }
};
