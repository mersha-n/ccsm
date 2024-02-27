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
        Schema::create('case_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deptName');
            $table->string('mid');
            $table->string('rank');
            $table->string('name');
            $table->string('address');
            $table->string('state');
            $table->text('crimeDescription');
            $table->dateTime('crimeDate');
            $table->dateTime('ChargeDate');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_charges');
    }
};
