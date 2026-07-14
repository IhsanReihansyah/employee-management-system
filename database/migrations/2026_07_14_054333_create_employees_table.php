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
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('employee_code')->unique();
        $table->string('photo')->nullable();
        $table->string('full_name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->enum('gender', ['Male', 'Female']);
        $table->date('birth_date');
        $table->string('department');
        $table->string('position');
        $table->decimal('salary', 12, 2)->nullable();
        $table->text('address')->nullable();
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
