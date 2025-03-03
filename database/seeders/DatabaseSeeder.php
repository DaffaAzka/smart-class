<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductContent;
use App\Models\Media;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // Buat 5 kategori utama
        $categories = Category::factory()
            ->count(5)
            ->create();

        // Untuk setiap kategori, buat subkategori dan produk
        $categories->each(function ($category) {
            // Buat 3 subkategori untuk setiap kategori utama
            $subCategories = Category::factory()
                ->count(3)
                ->create(['parent_id' => $category->id]);

            // Buat 5 produk untuk setiap kategori (termasuk subkategori)
            $subCategories->each(function ($subCategory) {
                Product::factory()
                    ->count(5)
                    ->create(['category_id' => $subCategory->id])
                    ->each(function ($product) {
                        // Buat 3 konten untuk setiap produk
                        ProductContent::factory()
                            ->count(3)
                            ->create(['product_id' => $product->id]);
                    });
            });
        });

        // Buat 10 media
        Media::factory()
            ->count(10)
            ->create();
    }
}
