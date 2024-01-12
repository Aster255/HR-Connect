<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('attendance_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->date('attendance_date');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->time('in_time');
            $table->string('in_status', 40)->nullable();
            $table->time('out_time')->nullable();
            $table->string('out_status', 70)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
