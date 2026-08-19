<?php

namespace Database\Seeders;

use App\Models\PropertyCategory;
use Illuminate\Database\Seeder;

class PropertyCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Residential Estates', 'description' => 'Premium gated communities and family homes', 'status' => true],
            ['name' => 'Low Cost Housing', 'description' => 'Affordable housing solutions for all', 'status' => true],
            ['name' => 'Residential Towers', 'description' => 'Modern high-rise apartment living', 'status' => true],
            ['name' => 'Commercial Buildings', 'description' => 'Office spaces and commercial properties', 'status' => true],
            ['name' => 'Warehouses', 'description' => 'Industrial and storage facilities', 'status' => true],
        ];

        foreach ($categories as $category) {
            PropertyCategory::create($category);
        }
    }
}