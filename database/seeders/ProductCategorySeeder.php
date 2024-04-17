<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Audio, Kamera & Elektronik Lainnya',
                'slug' => 'audio-kamera-dan-elektronik-lainnya',
                'icon'  => 'ri-speaker-2-fill'
            ],
            [
                'name' => 'Buku',
                'slug' => 'buku',
                'icon'  => 'ri-book-3-line'
            ],
            [
                'name' => 'Dapur',
                'slug' => 'dapur',
                'icon'  => 'ri-knife-fill'
            ],
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'icon'  => 'ri-exchange-box-line'
            ],
            [
                'name' => 'Fashion Anak & Bayi',
                'slug' => 'fashion-anak-dan-bayi',
                'icon'  => 'ri-user-heart-line'
            ],
            [
                "name" => "Fashion Muslim",
                "slug" => "fashion-muslim",
                "icon" => "ri-t-shirt-air-line"
            ],
            [
                "name" => "Fashion Pria",
                "slug" => "fashion-pria",
                "icon" => "ri-shirt-line"
            ],
            [
                "name" => "Fashion Wanita",
                "slug" => "fashion-wanita",
                "icon" => "ri-shirt-fill"
            ],
            [
                "name" => "Film & Musik",
                "slug" => "film-dan-musik",
                "icon" => "ri-mv-fill"
            ],
            [
                "name" => "Gaming",
                "slug" => "gaming",
                "icon" => "ri-gamepad-fill"
            ],
            [
                "name" => "Handphone & Tablet",
                "slug" => "handphone-dan-tablet",
                "icon" => "ri-smartphone-line"
            ],
            [
                "name" => "Ibu & Bayi",
                "slug" => "ibu-dan-bayi",
                "icon" => "ri-user-heart-fill"
            ],
            [
                "name" => "Kecantikan",
                "slug" => "kecantikan",
                "icon" => "ri-magic-line"
            ],
            [
                "name" => "Kesehatan",
                "slug" => "kesehatan",
                "icon" => "ri-heart-line"
            ],
            [
                "name" => "Komputer & Laptop",
                "slug" => "komputer-dan-laptop",
                "icon" => "ri-macbook-line"
            ],
            [
                "name" => "Mainan & Hobi",
                "slug" => "mainan-dan-hobi",
                "icon" => "ri-basketball-line"
            ],
            [
                "name" => "Makanan & Minuman",
                "slug" => "makanan-dan-minuman",
                "icon" => "ri-cake-3-line"
            ],
            [
                "name" => "Office & Stationery",
                "slug" => "office-and-stationery",
                "icon" => "ri-building-4-fill"
            ],
            [
                "name" => "Olahraga",
                "slug" => "olahraga",
                "icon" => "ri-football-fill"
            ],
            [
                "name" => "Otomotif",
                "slug" => "otomotif",
                "icon" => "ri-motorbike-line"
            ],
            [
                "name" => "Perawatan Hewan",
                "slug" => "perawatan-hewan",
                "icon" => "ri-bear-smile-line"
            ],
            [
                "name" => "Perawatan Tubuh",
                "slug" => "perawatan-tubuh",
                "icon" => "ri-mental-health-fill"
            ],
            [
                "name" => "Perlengkapan Pesta & Craft",
                "slug" => "perlengkapan-pesta-dan-craft",
                "icon" => "ri-cake-2-line"
            ],
            [
                "name" => "Produk Lainnya",
                "slug" => "produk-lainnya",
                "icon" => "ri-recycle-fill"
            ],
        ];

        ProductCategory::insert($categories);
    }
}
