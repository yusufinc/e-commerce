<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $sizeList = ['XS','S','M','L','XXL'];
        $categoryId = [1,2,3,4,5,6,7,8,9];
        $color = ['Beyaz','Siyah','Mavi','Turuncu','Yeşil'];
        $colortext = $color[random_int(0,4)];
        $size = $sizeList[random_int(0,4)];
        return [
            'name'=> $colortext.' '.$size. ' Urun',
            'category_id'=> $categoryId[random_int(0,8)],
            'short_text'=>  $categoryId[random_int(0,8)] . 'idli ürün',
            'price'=>random_int(10,500),
            'size'=>$size,
            'color'=>$colortext,
            'qty' => 1,
            'status'=>'1',
            'content'=>'İçerik yazıları burda olur'
        ];
    }
}
