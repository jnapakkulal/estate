<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Models\PropertyType;
use DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_types')->insert([
            [
                'type_name' => 'farm house',
                'type_icon' => 'icon 3',
            ],
            [
                'type_name' => 'tent',
                'type_icon' => 'icon 4',
            ],
        ]);

        PropertyType::orderBy('id')  // Add this line to specify an order
            ->chunk(100, function ($propertyTypes) {
                // Process the chunk
            });

        /*DB::table('property_types')->chunk(100, function ($propertyTypes) {
            foreach ($propertyTypes as $propertyType) {
                Log::info('Processing property type:', [
                    'type_name' => $propertyType->type_name,
                    'type_icon' => $propertyType->type_icon,
                ]);

            }
        });*/
    }

}
