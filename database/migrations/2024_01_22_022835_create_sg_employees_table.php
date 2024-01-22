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
        Schema::create('SG_EMPLOYEE', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('sg_role')->onDelete('cascade');
            $table->foreignId('jobs_id')->constrained('sg_jobs')->onDelete('cascade');
            $table->foreignId('team_id')->constrained('sg_team')->onDelete('cascade');
            $table->String('employee_name');
            $table->date('date_of_birth');
            $table->Integer('age');
            $table->String('mobile_number');
            $table->String('email');
            $table->String('username');
            $table->String('password');
            $table->enum ('gender', ['PRIA', 'WANITA']);
            $table->String('religion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SG_EMPLOYEE');
    }
};
