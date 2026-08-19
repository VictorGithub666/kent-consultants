// database/migrations/2024_01_01_000003_create_properties_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('location');
            $table->longText('description')->nullable();
            $table->enum('acquisition_type', ['buying', 'renting']);
            $table->foreignId('category_id')->constrained('property_categories')->onDelete('cascade');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('floor_area', 10, 2)->nullable();
            $table->decimal('land_area', 10, 2)->nullable();
            $table->integer('car_parking')->nullable();
            $table->decimal('price', 15, 2);
            $table->string('currency')->default('KSh');
            $table->string('rent_frequency')->nullable();
            $table->enum('status', ['vacant', 'occupied'])->default('vacant');
            $table->string('main_image')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};