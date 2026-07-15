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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('employee_code')->unique();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->foreignId('department_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
                
            $table->string('position');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
