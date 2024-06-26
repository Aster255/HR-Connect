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
        Schema::create('employee_notifies', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('name', 90)->nullable();
            $table->string('relationship', 90)->nullable();;
            $table->string('mobile_no', 200)->nullable();;
            $table->string('address', 200)->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_notifies');
    }
};
