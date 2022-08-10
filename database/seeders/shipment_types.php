<?php

namespace Database\Seeders;

use App\Models\shipment_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class shipment_types extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        shipment_type::insert([
            'id'=>1,
            'translation_lang'=>'ar',
            'translation_of'=>0,
            'name'=>'بري'
        ]);
        shipment_type::insert([
            'id'=>2,
            'translation_lang'=>'en',
            'translation_of'=>1,
            'name'=>'land'
        ]);
        shipment_type::insert([
            'id'=>3,
            'translation_lang'=>'ar',
            'translation_of'=>0,
            'name'=>'بحري'
        ]);
        shipment_type::insert([
            'id'=>4,
            'translation_lang'=>'en',
            'translation_of'=>3,
            'name'=>'sea'
        ]);
        shipment_type::insert([
            'id'=>5,
            'translation_lang'=>'ar',
            'translation_of'=>0,
            'name'=>'جوي'
        ]);
        shipment_type::insert([
            'id'=>6,
            'translation_lang'=>'en',
            'translation_of'=>5,
            'name'=>'air'
        ]);
    }
}
