<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    private $productId=[
        31,32,33,34,35,36,37,38,39,40
    ];
    private $path=['N6ROSm5yVkHv8CcFzq98KM72II2AiUAlnR3I4IEG.jpg'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $productImages = [];
        foreach ($this->productId as $productId) {
            $productImages[] = [
                'product_id' => $productId,
                'path' => $this->path[0],
                'created_at' => '2024-02-23 13:32:38',
                'updated_at' => '2024-02-23 13:32:38',
            ];
        }
        DB::table('products_images')->insert($productImages);

    }
}
