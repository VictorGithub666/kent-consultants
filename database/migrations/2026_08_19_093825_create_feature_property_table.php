// database/migrations/2024_01_01_000006_create_feature_property_pivot_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feature_property', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->foreignId('property_feature_id')->constrained('property_features')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['property_id', 'property_feature_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feature_property');
    }
};