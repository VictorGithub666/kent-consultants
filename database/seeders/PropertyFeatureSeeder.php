<?php

namespace Database\Seeders;

use App\Models\PropertyFeature;
use Illuminate\Database\Seeder;

class PropertyFeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            'Swimming Pool', '24/7 Security', 'CCTV', 'Backup Generator',
            'Borehole', 'Parking', 'Garden', 'Gym', 'Balcony',
            'Elevator', 'Serviced', 'Gated Community'
        ];

        foreach ($features as $feature) {
            PropertyFeature::create(['name' => $feature, 'status' => true]);
        }
    }
}