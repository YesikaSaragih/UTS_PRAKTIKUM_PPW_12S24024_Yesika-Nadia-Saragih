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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_id');
            $table->string('borrower_name', 100);
            $table->string('borrower_nim', 10);
            $table->string('borrower_email', 100);
            $table->date('loan_date');
            $table->date('expected_return_date');
            $table->text('purpose');
            $table->string('status');
            $table->integer('total_estimated_fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_requests');
    }
};
