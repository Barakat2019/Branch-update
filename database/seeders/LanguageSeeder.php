<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::insert([
            'id'=>1,
            'abbr'=>'ar',
            'locale'=>'ar',
            'name'=>'arabic',
            'direction'=>'rtl',
        ]);

        Language::insert([
            'id'=>2,
            'abbr'=>'en',
            'locale'=>'en',
            'name'=>'english',
            'direction'=>'ltr',
        ]);
    }
}
