<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       About::create([
        'name'=>'E-COMMERCIM E-ticaret',
        'content'=>'Hakkımızda yazısı burda',
        'text_1_icon'=>'fa-solid fa-truck-fast fa-3x',
        'text_1'=>'Ücretsiz Kargo',
        'text_1_content'=>'Ürünleriniz hızlı ve güvenilir şekilde kargolarız',
        'text_2_icon'=>'fa-solid fa-repeat fa-3x',
        'text_2'=>'Geri İade',
        'text_2_content'=>'30 gün içinde geri iade sağlarız',
        'text_3_icon'=>'fa-regular fa-circle-question fa-3x',
        'text_3'=>'Destek',
        'text_3_content'=>'7/24 Bize ulaşabilirsiniz.'
       ]);
    }
}
