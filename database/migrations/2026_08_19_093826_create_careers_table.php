// database/migrations/2024_01_01_000007_create_careers_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('slug')->unique();
            $table->string('department');
            $table->string('location');
            $table->string('employment_type');
            $table->longText('description');
            $table->longText('responsibilities')->nullable();
            $table->longText('requirements')->nullable();
            $table->date('application_deadline');
            $table->enum('status', ['draft', 'published', 'closed'])->default('draft');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};