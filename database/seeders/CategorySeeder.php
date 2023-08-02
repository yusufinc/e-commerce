<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $erkek =  Category::create([
            'image' => null,
            'thumbnail'=> null,
            'cat_ust'=> null,
            'name' => 'Erkek',
            'content'=> 'e-commercim sitesine hoş geldiniz',
            'status'=> '1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail'=> null,
            'cat_ust'=> $erkek->id,
            'name' => 'Erkek Kazak',
            'content'=> 'e-commercim sitesine hoş geldiniz',
            'status'=> '1'
        ]);

    $kadin =   Category::create([
            'image' => null,
            'thumbnail'=> null,
            'cat_ust'=> null,
            'name' => 'Kadın',
            'content'=> 'Kadın Giyim',
            'status'=> '1'
        ]);

     $cocuk =  Category::create([
            'image' => null,
            'thumbnail'=> null,
            'cat_ust'=> null,
            'name' => 'Çocuk',
            'content'=> 'Çocuk Giyim',
            'status'=> '1'
        ]);

    }
}
