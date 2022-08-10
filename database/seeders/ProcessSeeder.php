<?php

namespace Database\Seeders;

use App\Models\process;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        process::insert([
            'id'=>1,
            'name'=>'Custom inspection',
            'shipment_type_id'=>1
        ]);
        process::insert([
            'id'=>2,
            'name'=>'Land manifest',
            'shipment_type_id'=>1
        ]);
        process::insert([
            'id'=>3,
            'name'=>'Release from border',
            'shipment_type_id'=>1
        ]);
        process::insert([
            'id'=>4,
            'name'=>'GBS trucking',
            'shipment_type_id'=>1
        ]);
        process::insert([
            'id'=>5,
            'name'=>'Deliver to client',
            'shipment_type_id'=>1
        ]);

        process::insert([
            'id'=>6,
            'name'=>'Line DO',
            'shipment_type_id'=>3
        ]);
        process::insert([
            'id'=>7,
            'name'=>'Water Transport DO',
            'shipment_type_id'=>3
        ]);
        process::insert([
            'id'=>8,
            'name'=>'Loading',
            'shipment_type_id'=>3
        ]);
        process::insert([
            'id'=>9,
            'name'=>'Custom inspection',
            'shipment_type_id'=>3
        ]);
        process::insert([
            'id'=>10,
            'name'=>'Release trucks',
            'shipment_type_id'=>3
        ]);
        process::insert([
            'id'=>11,
            'name'=>'GBS trucking',
            'shipment_type_id'=>3
        ]);
        process::insert([
            'id'=>12,
            'name'=>'Discharges at client location',
            'shipment_type_id'=>3
        ]);
        process::insert([
            'id'=>13,
            'name'=>'Iraqi DO',
            'shipment_type_id'=>5
        ]);
        process::insert([
            'id'=>14,
            'name'=>'Loading',
            'shipment_type_id'=>5
        ]);
        process::insert([
            'id'=>15,
            'name'=>'Custom inspection',
            'shipment_type_id'=>5
        ]);
        process::insert([
            'id'=>16,
            'name'=>'Release cargo',
            'shipment_type_id'=>5
        ]);
        process::insert([
            'id'=>17,
            'name'=>'GBS trucking',
            'shipment_type_id'=>5
        ]);
        process::insert([
            'id'=>18,
            'name'=>'Deliver cargo',
            'shipment_type_id'=>5
        ]);
       
    }
}
