<?php

namespace Database\Seeders;
use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name'=>'adres',
            'data'=>'Arnavutköy/İstanbul, Türkiye',
        ]);

        SiteSetting::create([
            'name'=>'phone',
            'data'=>'+90 505 767 9152',
        ]);

        SiteSetting::create([
            'name'=>'email',
            'data'=>'test@domain.com' ,
        ]);

        SiteSetting::create([
            'name'=>'harita',
            'data'=>null ,
        ]);
    }
}
