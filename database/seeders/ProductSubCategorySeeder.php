<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSubCategory;

class ProductSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = array(
            0 => array(
                'name' => 'Aksesoris Kamera',
                'slug' => 'aksesoris-kamera',
                'product_category_id' => '1'
            ),
            1 => array(
                'name' => 'Audio',
                'slug' => 'audio',
                'product_category_id' => '1'
            ),
            2 => array(
                'name' => 'Baterai & Charger Kamera',
                'slug' => 'baterai-charger-kamera',
                'product_category_id' => '1'
            ),
            3 => array(
                'name' => 'Cleaning Tools Kamera',
                'slug' => 'cleaning-tools-kamera',
                'product_category_id' => '1'
            ),
            4 => array(
                'name' => 'Drone & Aksesoriss',
                'slug' => 'drone-aksesoriss',
                'product_category_id' => '1'
            ),
            5 => array(
                'name' => 'Frame, Album & Roll Film',
                'slug' => 'frame-album-roll-film',
                'product_category_id' => '1'
            ),
            6 => array(
                'name' => 'Kamera Analog',
                'slug' => 'kamera-analog',
                'product_category_id' => '1'
            ),
            7 => array(
                'name' => 'Kamera Digital',
                'slug' => 'kamera-digital',
                'product_category_id' => '1'
            ),
            8 => array(
                'name' => 'Kamera Pengintai',
                'slug' => 'kamera-pengintai',
                'product_category_id' => '1'
            ),
            9 => array(
                'name' => 'Lensa & Aksesoris',
                'slug' => 'lensa-aksesoris',
                'product_category_id' => '1'
            ),
            10 => array(
                'name' => 'Lighting & Studio',
                'slug' => 'lighting-studio',
                'product_category_id' => '1'
            ),
            11 => array(
                'name' => 'Perangkat Elektronik Lainnya',
                'slug' => 'perangkat-elektronik-lainnya',
                'product_category_id' => '1'
            ),
            12 => array(
                'name' => 'Perangkat Keamanan',
                'slug' => 'perangkat-keamanan',
                'product_category_id' => '1'
            ),
            13 => array(
                'name' => 'Tas & Case Kamera',
                'slug' => 'tas-case-kamera',
                'product_category_id' => '1'
            ),
            14 => array(
                'name' => 'Arsitektur & Desain',
                'slug' => 'arsitektur-desain',
                'product_category_id' => '2'
            ),
            15 => array(
                'name' => 'Buku Hukum',
                'slug' => 'buku-hukum',
                'product_category_id' => '2'
            ),
            16 => array(
                'name' => 'Buku Import',
                'slug' => 'buku-import',
                'product_category_id' => '2'
            ),
            17 => array(
                'name' => 'Buku Masakan',
                'slug' => 'buku-masakan',
                'product_category_id' => '2'
            ),
            18 => array(
                'name' => 'Buku Persiapan Ujian',
                'slug' => 'buku-persiapan-ujian',
                'product_category_id' => '2'
            ),
            19 => array(
                'name' => 'Buku Remaja dan Anak',
                'slug' => 'buku-remaja-dan-anak',
                'product_category_id' => '2'
            ),
            20 => array(
                'name' => 'Ekonomi & Bisnis',
                'slug' => 'ekonomi-bisnis',
                'product_category_id' => '2'
            ),
            21 => array(
                'name' => 'hobi',
                'slug' => 'hobi',
                'product_category_id' => '2'
            ),
            22 => array(
                'name' => 'Kamus & Bahasa Asing',
                'slug' => 'kamus-bahasa-asing',
                'product_category_id' => '2'
            ),
            23 => array(
                'name' => 'Kedokteran',
                'slug' => 'kedokteran',
                'product_category_id' => '2'
            ),
            24 => array(
                'name' => 'Keluarga',
                'slug' => 'keluarga',
                'product_category_id' => '2'
            ),
            25 => array(
                'name' => 'Kesehatan & Gaya Hidup',
                'slug' => 'kesehatan-gaya-hidup',
                'product_category_id' => '2'
            ),
            26 => array(
                'name' => 'Kewanitaan',
                'slug' => 'kewanitaan',
                'product_category_id' => '2'
            ),
            27 => array(
                'name' => 'Komik',
                'slug' => 'komik',
                'product_category_id' => '2'
            ),
            28 => array(
                'name' => 'Lainnya di Buku',
                'slug' => 'lainnya-di-buku',
                'product_category_id' => '2'
            ),
            29 => array(
                'name' => 'Majalah',
                'slug' => 'majalah',
                'product_category_id' => '2'
            ),
            30 => array(
                'name' => 'Novel & Sastra',
                'slug' => 'novel-sastra',
                'product_category_id' => '2'
            ),
            31 => array(
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'product_category_id' => '2'
            ),
            32 => array(
                'name' => 'Pengembangan Diri & Karir',
                'slug' => 'pengembangan-diri-karir',
                'product_category_id' => '2'
            ),
            33 => array(
                'name' => 'Pertanian',
                'slug' => 'pertanian',
                'product_category_id' => '2'
            ),
            34 => array(
                'name' => 'Religi & Spritual',
                'slug' => 'religi-spritual',
                'product_category_id' => '2'
            ),
            35 => array(
                'name' => 'Sosial Politik',
                'slug' => 'sosial-politik',
                'product_category_id' => '2'
            ),
            36 => array(
                'name' => 'Teknik & Sains',
                'slug' => 'teknik-sains',
                'product_category_id' => '2'
            ),
            37 => array(
                'name' => 'Aksesoris Dapur',
                'slug' => 'aksesoris-dapur',
                'product_category_id' => '3'
            ),
            38 => array(
                'name' => 'Alat Masak Khusus',
                'slug' => 'alat-masak-khusus',
                'product_category_id' => '3'
            ),
            39 => array(
                'name' => 'Bekal',
                'slug' => 'bekal',
                'product_category_id' => '3'
            ),
            40 => array(
                'name' => 'Penyimpanan Makanan',
                'slug' => 'penyimpanan-makanan',
                'product_category_id' => '3'
            ),
            41 => array(
                'name' => 'Peralatan Baking',
                'slug' => 'peralatan-baking',
                'product_category_id' => '3'
            ),
            42 => array(
                'name' => 'Peralatan Dapur',
                'slug' => 'peralatan-dapur',
                'product_category_id' => '3'
            ),
            43 => array(
                'name' => 'Peralatan Makan & Minum',
                'slug' => 'peralatan-makan-minum',
                'product_category_id' => '3'
            ),
            44 => array(
                'name' => 'Kemasan Makanan dan Minuman',
                'slug' => 'kemasan-makanan-dan-minuman',
                'product_category_id' => '3'
            ),
            45 => array(
                'name' => 'Peralatan Masak',
                'slug' => 'peralatan-masak',
                'product_category_id' => '3'
            ),
            46 => array(
                'name' => 'Peralatan Cuci Piring',
                'slug' => 'peralatan-cuci-piring',
                'product_category_id' => '3'
            ),
            47 => array(
                'name' => 'Lainnya di Dapur',
                'slug' => 'lainnya-di-dapur',
                'product_category_id' => '3'
            ),
            48 => array(
                'name' => 'Alat Pendingin Ruangan',
                'slug' => 'alat-pendingin-ruangan',
                'product_category_id' => '4'
            ),
            49 => array(
                'name' => 'Elektronik Dapur',
                'slug' => 'elektronik-dapur',
                'product_category_id' => '4'
            ),
            50 => array(
                'name' => 'Elektronik Kantor',
                'slug' => 'elektronik-kantor',
                'product_category_id' => '4'
            ),
            51 => array(
                'name' => 'Lampu',
                'slug' => 'lampu',
                'product_category_id' => '4'
            ),
            52 => array(
                'name' => 'Media Player',
                'slug' => 'media-player',
                'product_category_id' => '4'
            ),
            53 => array(
                'name' => 'Printer',
                'slug' => 'printer',
                'product_category_id' => '4'
            ),
            54 => array(
                'name' => 'TV & Aksesoris',
                'slug' => 'tv-aksesoris',
                'product_category_id' => '4'
            ),
            55 => array(
                'name' => 'Elektronik Rumah Tangga',
                'slug' => 'elektronik-rumah-tangga',
                'product_category_id' => '4'
            ),
            56 => array(
                'name' => 'Telepon',
                'slug' => 'telepon',
                'product_category_id' => '4'
            ),
            57 => array(
                'name' => 'Aksesoris Anak',
                'slug' => 'aksesoris-anak',
                'product_category_id' => '5'
            ),
            58 => array(
                'name' => 'Aksesoris Bayi',
                'slug' => 'aksesoris-bayi',
                'product_category_id' => '5'
            ),
            59 => array(
                'name' => 'Baju & Sepatu Bayi',
                'slug' => 'baju-sepatu-bayi',
                'product_category_id' => '5'
            ),
            60 => array(
                'name' => 'Pakaian Anak Perempuan',
                'slug' => 'pakaian-anak-perempuan',
                'product_category_id' => '5'
            ),
            61 => array(
                'name' => 'Pakaian Dalam Anak',
                'slug' => 'pakaian-dalam-anak',
                'product_category_id' => '5'
            ),
            62 => array(
                'name' => 'Perhiasan Anak',
                'slug' => 'perhiasan-anak',
                'product_category_id' => '5'
            ),
            63 => array(
                'name' => 'Sepatu Anak Laki-laki',
                'slug' => 'sepatu-anak-laki-laki',
                'product_category_id' => '5'
            ),
            64 => array(
                'name' => 'Jam Tangan Anak',
                'slug' => 'jam-tangan-anak',
                'product_category_id' => '5'
            ),
            65 => array(
                'name' => 'Sepatu Anak Perempuan',
                'slug' => 'sepatu-anak-perempuan',
                'product_category_id' => '5'
            ),
            66 => array(
                'name' => 'Kostum Anak',
                'slug' => 'kostum-anak',
                'product_category_id' => '5'
            ),
            67 => array(
                'name' => 'Seragam Sekolah',
                'slug' => 'seragam-sekolah',
                'product_category_id' => '5'
            ),
            68 => array(
                'name' => 'Pakaian Adat Anak',
                'slug' => 'pakaian-adat-anak',
                'product_category_id' => '5'
            ),
            69 => array(
                'name' => 'Pakaian Anak Laki-laki',
                'slug' => 'pakaian-anak-laki-laki',
                'product_category_id' => '5'
            ),
            70 => array(
                'name' => 'Tas Anak',
                'slug' => 'tas-anak',
                'product_category_id' => '5'
            ),
            71 => array(
                'name' => 'Aksesoris Muslim',
                'slug' => 'aksesoris-muslim',
                'product_category_id' => '6'
            ),
            72 => array(
                'name' => 'Masker Hijab',
                'slug' => 'masker-hijab',
                'product_category_id' => '6'
            ),
            73 => array(
                'name' => 'Atasan Muslim Wanita',
                'slug' => 'atasan-muslim-wanita',
                'product_category_id' => '6'
            ),
            74 => array(
                'name' => 'Outwear Muslim Wanita',
                'slug' => 'outwear-muslim-wanita',
                'product_category_id' => '6'
            ),
            75 => array(
                'name' => 'Baju Renang Muslim',
                'slug' => 'baju-renang-muslim',
                'product_category_id' => '6'
            ),
            76 => array(
                'name' => 'Pakaian Anak Muslim',
                'slug' => 'pakaian-anak-muslim',
                'product_category_id' => '6'
            ),
            77 => array(
                'name' => 'Pakaian Muslim Pria',
                'slug' => 'pakaian-muslim-pria',
                'product_category_id' => '6'
            ),
            78 => array(
                'name' => 'Bawahan Wanita Muslim',
                'slug' => 'bawahan-wanita-muslim',
                'product_category_id' => '6'
            ),
            79 => array(
                'name' => 'Dress Muslim Wanita',
                'slug' => 'dress-muslim-wanita',
                'product_category_id' => '6'
            ),
            80 => array(
                'name' => 'Perlengkapan Ibadah',
                'slug' => 'perlengkapan-ibadah',
                'product_category_id' => '6'
            ),
            81 => array(
                'name' => 'Jilbab',
                'slug' => 'jilbab',
                'product_category_id' => '6'
            ),
            82 => array(
                'name' => 'Aksesoris Pria',
                'slug' => 'aksesoris-pria',
                'product_category_id' => '7'
            ),
            83 => array(
                'name' => 'Masker Pria',
                'slug' => 'masker-pria',
                'product_category_id' => '7'
            ),
            84 => array(
                'name' => 'Outwear Pria',
                'slug' => 'outwear-pria',
                'product_category_id' => '7'
            ),
            85 => array(
                'name' => 'Pakaian Adat Pria',
                'slug' => 'pakaian-adat-pria',
                'product_category_id' => '7'
            ),
            86 => array(
                'name' => 'Pakaian Dalam Pria',
                'slug' => 'pakaian-dalam-pria',
                'product_category_id' => '7'
            ),
            87 => array(
                'name' => 'Aksesoris Sepatu Pria',
                'slug' => 'aksesoris-sepatu-pria',
                'product_category_id' => '7'
            ),
            88 => array(
                'name' => 'Atasan Pria',
                'slug' => 'atasan-pria',
                'product_category_id' => '7'
            ),
            89 => array(
                'name' => 'Baju Tidur Pria',
                'slug' => 'baju-tidur-pria',
                'product_category_id' => '7'
            ),
            90 => array(
                'name' => 'Batik Pria',
                'slug' => 'batik-pria',
                'product_category_id' => '7'
            ),
            91 => array(
                'name' => 'Perhiasan Pria',
                'slug' => 'perhiasan-pria',
                'product_category_id' => '7'
            ),
            92 => array(
                'name' => 'Sepatu & Sandal Pria',
                'slug' => 'sepatu-sandal-pria',
                'product_category_id' => '7'
            ),
            93 => array(
                'name' => 'Blazer & Jas Pria',
                'slug' => 'blazer-jas-pria',
                'product_category_id' => '7'
            ),
            94 => array(
                'name' => 'Seragam Pria',
                'slug' => 'seragam-pria',
                'product_category_id' => '7'
            ),
            95 => array(
                'name' => 'Celana Pria',
                'slug' => 'celana-pria',
                'product_category_id' => '7'
            ),
            96 => array(
                'name' => 'Tas Pria',
                'slug' => 'tas-pria',
                'product_category_id' => '7'
            ),
            97 => array(
                'name' => 'Jam Tangan Pria',
                'slug' => 'jam-tangan-pria',
                'product_category_id' => '7'
            ),
            98 => array(
                'name' => 'Topi Pria',
                'slug' => 'topi-pria',
                'product_category_id' => '7'
            ),
            99 => array(
                'name' => 'Jeans & Denim Pria',
                'slug' => 'jeans-denim-pria',
                'product_category_id' => '7'
            ),
            100 => array(
                'name' => 'Aksesoris Sepatu Wanita',
                'slug' => 'aksesoris-sepatu-wanita',
                'product_category_id' => '8'
            ),
            101 => array(
                'name' => 'Aksesoris Wanita',
                'slug' => 'aksesoris-wanita',
                'product_category_id' => '8'
            ),
            102 => array(
                'name' => 'Atasan Wanita',
                'slug' => 'atasan-wanita',
                'product_category_id' => '8'
            ),
            103 => array(
                'name' => 'Baju Tidur Wanita',
                'slug' => 'baju-tidur-wanita',
                'product_category_id' => '8'
            ),
            104 => array(
                'name' => 'Jeans & Denim Wanita',
                'slug' => 'jeans-denim-wanita',
                'product_category_id' => '8'
            ),
            105 => array(
                'name' => 'Kebaya',
                'slug' => 'kebaya',
                'product_category_id' => '8'
            ),
            106 => array(
                'name' => 'Masker Wanita',
                'slug' => 'masker-wanita',
                'product_category_id' => '8'
            ),
            107 => array(
                'name' => 'Outwear Wanita',
                'slug' => 'outwear-wanita',
                'product_category_id' => '8'
            ),
            108 => array(
                'name' => 'Pakaian Adat Wanita',
                'slug' => 'pakaian-adat-wanita',
                'product_category_id' => '8'
            ),
            109 => array(
                'name' => 'Batik Wanita',
                'slug' => 'batik-wanita',
                'product_category_id' => '8'
            ),
            110 => array(
                'name' => 'Pakaian Dalam Wanita',
                'slug' => 'pakaian-dalam-wanita',
                'product_category_id' => '8'
            ),
            111 => array(
                'name' => 'Bawahan Wanita',
                'slug' => 'bawahan-wanita',
                'product_category_id' => '8'
            ),
            112 => array(
                'name' => 'Perhiasan Wanita',
                'slug' => 'perhiasan-wanita',
                'product_category_id' => '8'
            ),
            113 => array(
                'name' => 'Beachwear Wanita',
                'slug' => 'beachwear-wanita',
                'product_category_id' => '8'
            ),
            114 => array(
                'name' => 'Sepatu & Sandal Wanita',
                'slug' => 'sepatu-sandal-wanita',
                'product_category_id' => '8'
            ),
            115 => array(
                'name' => 'Bridal',
                'slug' => 'bridal',
                'product_category_id' => '8'
            ),
            116 => array(
                'name' => 'Dress',
                'slug' => 'dress',
                'product_category_id' => '8'
            ),
            117 => array(
                'name' => 'Seragam Wanita',
                'slug' => 'seragam-wanita',
                'product_category_id' => '8'
            ),
            118 => array(
                'name' => 'Fashion Couple',
                'slug' => 'fashion-couple',
                'product_category_id' => '8'
            ),
            119 => array(
                'name' => 'Setelan Wanita',
                'slug' => 'setelan-wanita',
                'product_category_id' => '8'
            ),
            120 => array(
                'name' => 'Jam Tangan Wanita',
                'slug' => 'jam-tangan-wanita',
                'product_category_id' => '8'
            ),
            121 => array(
                'name' => 'Tas Wanita',
                'slug' => 'tas-wanita',
                'product_category_id' => '8'
            ),
            122 => array(
                'name' => 'Alat Musik Digital',
                'slug' => 'alat-musik-digital',
                'product_category_id' => '9'
            ),
            123 => array(
                'name' => 'Film & Serial TV',
                'slug' => 'film-serial-tv',
                'product_category_id' => '9'
            ),
            124 => array(
                'name' => 'Gitar & Bass',
                'slug' => 'gitar-bass',
                'product_category_id' => '9'
            ),
            125 => array(
                'name' => 'Alat Musik Gesek',
                'slug' => 'alat-musik-gesek',
                'product_category_id' => '9'
            ),
            126 => array(
                'name' => 'Alat Musik Tiup',
                'slug' => 'alat-musik-tiup',
                'product_category_id' => '9'
            ),
            127 => array(
                'name' => 'Keyboard & Piano',
                'slug' => 'keyboard-piano',
                'product_category_id' => '9'
            ),
            128 => array(
                'name' => 'Alat Musik Tradisional',
                'slug' => 'alat-musik-tradisional',
                'product_category_id' => '9'
            ),
            129 => array(
                'name' => 'Musik',
                'slug' => 'musik',
                'product_category_id' => '9'
            ),
            130 => array(
                'name' => 'Drum & Perkusi',
                'slug' => 'drum-perkusi',
                'product_category_id' => '9'
            ),
            131 => array(
                'name' => 'Perlengkapan Alat Musik',
                'slug' => 'perlengkapan-alat-musik',
                'product_category_id' => '9'
            ),
            132 => array(
                'name' => 'Vokal',
                'slug' => 'vokal',
                'product_category_id' => '9'
            ),
            133 => array(
                'name' => 'Aksesoris Game Console',
                'slug' => 'aksesoris-game-console',
                'product_category_id' => '10'
            ),
            134 => array(
                'name' => 'Aksesoris Mobile Gaming',
                'slug' => 'aksesoris-mobile-gaming',
                'product_category_id' => '10'
            ),
            135 => array(
                'name' => 'CD Game',
                'slug' => 'cd-game',
                'product_category_id' => '10'
            ),
            136 => array(
                'name' => 'Game Console',
                'slug' => 'game-console',
                'product_category_id' => '10'
            ),
            137 => array(
                'name' => 'Virtual Reality',
                'slug' => 'virtual-reality',
                'product_category_id' => '10'
            ),
            138 => array(
                'name' => 'Aksesoris Handphone',
                'slug' => 'aksesoris-handphone',
                'product_category_id' => '11'
            ),
            139 => array(
                'name' => 'Handphone',
                'slug' => 'handphone',
                'product_category_id' => '11'
            ),
            140 => array(
                'name' => 'Komponen Handphone',
                'slug' => 'komponen-handphone',
                'product_category_id' => '11'
            ),
            141 => array(
                'name' => 'Aksesoris Tablet',
                'slug' => 'aksesoris-tablet',
                'product_category_id' => '11'
            ),
            142 => array(
                'name' => 'Komponen Tablet',
                'slug' => 'komponen-tablet',
                'product_category_id' => '11'
            ),
            143 => array(
                'name' => 'Nomor Perdana & Voucher',
                'slug' => 'nomor-perdana-voucher',
                'product_category_id' => '11'
            ),
            144 => array(
                'name' => 'Power Bank',
                'slug' => 'power-bank',
                'product_category_id' => '11'
            ),
            145 => array(
                'name' => 'Tablet',
                'slug' => 'tablet',
                'product_category_id' => '11'
            ),
            146 => array(
                'name' => 'Wearable Devices',
                'slug' => 'wearable-devices',
                'product_category_id' => '11'
            ),
            147 => array(
                'name' => 'Mainan & Aktivitas Bayi',
                'slug' => 'mainan-aktivitas-bayi',
                'product_category_id' => '12'
            ),
            148 => array(
                'name' => 'Makanan & Susu Bayi',
                'slug' => 'makanan-susu-bayi',
                'product_category_id' => '12'
            ),
            149 => array(
                'name' => 'Makanan & Susu Ibu Hamil',
                'slug' => 'makanan-susu-ibu-hamil',
                'product_category_id' => '12'
            ),
            150 => array(
                'name' => 'Pakaian Ibu Hamil',
                'slug' => 'pakaian-ibu-hamil',
                'product_category_id' => '12'
            ),
            151 => array(
                'name' => 'Perawatan Bayi',
                'slug' => 'perawatan-bayi',
                'product_category_id' => '12'
            ),
            152 => array(
                'name' => 'Perlengkapan & Perawatan Ibu',
                'slug' => 'perlengkapan-perawatan-ibu',
                'product_category_id' => '12'
            ),
            153 => array(
                'name' => 'Perlengkapan Makan Bayi',
                'slug' => 'perlengkapan-makan-bayi',
                'product_category_id' => '12'
            ),
            154 => array(
                'name' => 'Perlengkapan Mandi Bayi',
                'slug' => 'perlengkapan-mandi-bayi',
                'product_category_id' => '12'
            ),
            155 => array(
                'name' => 'Perlengkapan Tidur Bayi',
                'slug' => 'perlengkapan-tidur-bayi',
                'product_category_id' => '12'
            ),
            156 => array(
                'name' => 'Popok',
                'slug' => 'popok',
                'product_category_id' => '12'
            ),
            157 => array(
                'name' => 'Peralatan Perlengkapan Menyusui',
                'slug' => 'peralatan-perlengkapan-menyusui',
                'product_category_id' => '12'
            ),
            158 => array(
                'name' => 'Stroller & Alat Bantu Bawa Bayi',
                'slug' => 'stroller-alat-bantu-bawa-bayi',
                'product_category_id' => '12'
            ),
            159 => array(
                'name' => 'Aksesoris Rambut',
                'slug' => 'aksesoris-rambut',
                'product_category_id' => '13'
            ),
            160 => array(
                'name' => 'Make Up Wajah',
                'slug' => 'make-up-wajah',
                'product_category_id' => '13'
            ),
            161 => array(
                'name' => 'Brush Applicator',
                'slug' => 'brush-applicator',
                'product_category_id' => '13'
            ),
            162 => array(
                'name' => 'Masker Kecantikan',
                'slug' => 'masker-kecantikan',
                'product_category_id' => '13'
            ),
            163 => array(
                'name' => 'Mix Palette',
                'slug' => 'mix-palette',
                'product_category_id' => '13'
            ),
            164 => array(
                'name' => 'Eyebrow Kit',
                'slug' => 'eyebrow-kit',
                'product_category_id' => '13'
            ),
            165 => array(
                'name' => 'Pembersih Make Up',
                'slug' => 'pembersih-make-up',
                'product_category_id' => '13'
            ),
            166 => array(
                'name' => 'Perawatan Kuku & Nail Art',
                'slug' => 'perawatan-kuku-nail-art',
                'product_category_id' => '13'
            ),
            167 => array(
                'name' => 'Face & Body Paint Kit',
                'slug' => 'face-body-paint-kit',
                'product_category_id' => '13'
            ),
            168 => array(
                'name' => 'Lip Color & Lip Care',
                'slug' => 'lip-color-lip-care',
                'product_category_id' => '13'
            ),
            169 => array(
                'name' => 'Perawatan Wajah',
                'slug' => 'perawatan-wajah',
                'product_category_id' => '13'
            ),
            170 => array(
                'name' => 'Make Up Mata',
                'slug' => 'make-up-mata',
                'product_category_id' => '13'
            ),
            171 => array(
                'name' => 'Styling Rambut Wanita',
                'slug' => 'styling-rambut-wanita',
                'product_category_id' => '13'
            ),
            172 => array(
                'name' => 'Make Up Tools',
                'slug' => 'make-up-tools',
                'product_category_id' => '13'
            ),
            173 => array(
                'name' => 'Suplemen Kecantikan Collagen',
                'slug' => 'suplemen-kecantikan-collagen',
                'product_category_id' => '13'
            ),
            174 => array(
                'name' => 'Essential Oil',
                'slug' => 'essential-oil',
                'product_category_id' => '14'
            ),
            175 => array(
                'name' => 'Perlengkapan Medis',
                'slug' => 'perlengkapan-medis',
                'product_category_id' => '14'
            ),
            176 => array(
                'name' => 'Kesehatan Wanita',
                'slug' => 'kesehatan-wanita',
                'product_category_id' => '14'
            ),
            177 => array(
                'name' => 'Lainnya di Kesehatan',
                'slug' => 'lainnya-di-kesehatan',
                'product_category_id' => '14'
            ),
            178 => array(
                'name' => 'Produk Dewasa',
                'slug' => 'produk-dewasa',
                'product_category_id' => '14'
            ),
            179 => array(
                'name' => 'Suplemen Diet',
                'slug' => 'suplemen-diet',
                'product_category_id' => '14'
            ),
            180 => array(
                'name' => 'Obat-Obatan',
                'slug' => 'obat-obatan',
                'product_category_id' => '14'
            ),
            181 => array(
                'name' => 'Tes Kehamilan dan Masa Subur',
                'slug' => 'tes-kehamilan-dan-masa-subur',
                'product_category_id' => '14'
            ),
            182 => array(
                'name' => 'Tulang Otot & Sendi',
                'slug' => 'tulang-otot-sendi',
                'product_category_id' => '14'
            ),
            183 => array(
                'name' => 'Perlengkapan Kebersihan',
                'slug' => 'perlengkapan-kebersihan',
                'product_category_id' => '14'
            ),
            184 => array(
                'name' => 'Vitamin & Multivitamin',
                'slug' => 'vitamin-multivitamin',
                'product_category_id' => '14'
            ),
            185 => array(
                'name' => 'Aksesoris Komputer & Laptop',
                'slug' => 'aksesoris-komputer-laptop',
                'product_category_id' => '15'
            ),
            186 => array(
                'name' => 'Komponen Laptop',
                'slug' => 'komponen-laptop',
                'product_category_id' => '15'
            ),
            187 => array(
                'name' => 'Laptop',
                'slug' => 'laptop',
                'product_category_id' => '15'
            ),
            188 => array(
                'name' => 'Media Penyimpanan Data',
                'slug' => 'media-penyimpanan-data',
                'product_category_id' => '15'
            ),
            189 => array(
                'name' => 'Memory Card',
                'slug' => 'memory-card',
                'product_category_id' => '15'
            ),
            190 => array(
                'name' => 'Aksesoris PC Gaming',
                'slug' => 'aksesoris-pc-gaming',
                'product_category_id' => '15'
            ),
            191 => array(
                'name' => 'Monitor',
                'slug' => 'monitor',
                'product_category_id' => '15'
            ),
            192 => array(
                'name' => 'Desktop & Mini PC',
                'slug' => 'desktop-mini-pc',
                'product_category_id' => '15'
            ),
            193 => array(
                'name' => 'Networking',
                'slug' => 'networking',
                'product_category_id' => '15'
            ),
            194 => array(
                'name' => 'Kabel & Adaptor',
                'slug' => 'kabel-adaptor',
                'product_category_id' => '15'
            ),
            195 => array(
                'name' => 'PC & Laptop Gaming',
                'slug' => 'pc-laptop-gaming',
                'product_category_id' => '15'
            ),
            196 => array(
                'name' => 'Komponen Komputer',
                'slug' => 'komponen-komputer',
                'product_category_id' => '15'
            ),
            197 => array(
                'name' => 'Software',
                'slug' => 'software',
                'product_category_id' => '15'
            ),
            198 => array(
                'name' => 'Aksesoris Airsoft Gun',
                'slug' => 'aksesoris-airsoft-gun',
                'product_category_id' => '16'
            ),
            199 => array(
                'name' => 'Board Game',
                'slug' => 'board-game',
                'product_category_id' => '16'
            ),
            200 => array(
                'name' => 'Mainan Anak-anak',
                'slug' => 'mainan-anak-anak',
                'product_category_id' => '16'
            ),
            201 => array(
                'name' => 'Mainan Remote Control',
                'slug' => 'mainan-remote-control',
                'product_category_id' => '16'
            ),
            202 => array(
                'name' => 'Boneka',
                'slug' => 'boneka',
                'product_category_id' => '16'
            ),
            203 => array(
                'name' => 'Model Kit',
                'slug' => 'model-kit',
                'product_category_id' => '16'
            ),
            204 => array(
                'name' => 'Diecast',
                'slug' => 'diecast',
                'product_category_id' => '16'
            ),
            205 => array(
                'name' => 'Perlengkapan Sulap',
                'slug' => 'perlengkapan-sulap',
                'product_category_id' => '16'
            ),
            206 => array(
                'name' => 'Permainan Kartu',
                'slug' => 'permainan-kartu',
                'product_category_id' => '16'
            ),
            207 => array(
                'name' => 'Permainan Tradisional',
                'slug' => 'permainan-tradisional',
                'product_category_id' => '16'
            ),
            208 => array(
                'name' => 'Figure',
                'slug' => 'figure',
                'product_category_id' => '16'
            ),
            209 => array(
                'name' => 'Puzzle',
                'slug' => 'puzzle',
                'product_category_id' => '16'
            ),
            210 => array(
                'name' => 'Gag & Prank Toy',
                'slug' => 'gag-prank-toy',
                'product_category_id' => '16'
            ),
            211 => array(
                'name' => 'Kostum',
                'slug' => 'kostum',
                'product_category_id' => '16'
            ),
            212 => array(
                'name' => 'Stress Relieve Toys',
                'slug' => 'stress-relieve-toys',
                'product_category_id' => '16'
            ),
            213 => array(
                'name' => 'Bahan Kue',
                'slug' => 'bahan-kue',
                'product_category_id' => '17'
            ),
            214 => array(
                'name' => 'Makanan Ringan',
                'slug' => 'makanan-ringan',
                'product_category_id' => '17'
            ),
            215 => array(
                'name' => 'Beras',
                'slug' => 'beras',
                'product_category_id' => '17'
            ),
            216 => array(
                'name' => 'Makanan Sarapan',
                'slug' => 'makanan-sarapan',
                'product_category_id' => '17'
            ),
            217 => array(
                'name' => 'Mie & Pasta',
                'slug' => 'mie-pasta',
                'product_category_id' => '17'
            ),
            218 => array(
                'name' => 'Minuman',
                'slug' => 'minuman',
                'product_category_id' => '17'
            ),
            219 => array(
                'name' => 'Buah',
                'slug' => 'buah',
                'product_category_id' => '17'
            ),
            220 => array(
                'name' => 'Sayur',
                'slug' => 'sayur',
                'product_category_id' => '17'
            ),
            221 => array(
                'name' => 'Daging',
                'slug' => 'daging',
                'product_category_id' => '17'
            ),
            222 => array(
                'name' => 'Seafood',
                'slug' => 'seafood',
                'product_category_id' => '17'
            ),
            223 => array(
                'name' => 'Hampers, Parsel dan Paket Makanan',
                'slug' => 'hampers-parsel-dan-paket-makanan',
                'product_category_id' => '17'
            ),
            224 => array(
                'name' => 'Kue',
                'slug' => 'kue',
                'product_category_id' => '17'
            ),
            225 => array(
                'name' => 'Susu & Olahan Susu',
                'slug' => 'susu-olahan-susu',
                'product_category_id' => '17'
            ),
            226 => array(
                'name' => 'Makanan Beku',
                'slug' => 'makanan-beku',
                'product_category_id' => '17'
            ),
            227 => array(
                'name' => 'Makanan Jadi',
                'slug' => 'makanan-jadi',
                'product_category_id' => '17'
            ),
            228 => array(
                'name' => 'Telur',
                'slug' => 'telur',
                'product_category_id' => '17'
            ),
            229 => array(
                'name' => 'Tepung',
                'slug' => 'tepung',
                'product_category_id' => '17'
            ),
            230 => array(
                'name' => 'Makanan Kering',
                'slug' => 'makanan-kering',
                'product_category_id' => '17'
            ),
            231 => array(
                'name' => 'Alat Tulis',
                'slug' => 'alat-tulis',
                'product_category_id' => '18'
            ),
            232 => array(
                'name' => 'Kalkulator & Kamus Elektronik',
                'slug' => 'kalkulator-kamus-elektronik',
                'product_category_id' => '18'
            ),
            233 => array(
                'name' => 'Kertas',
                'slug' => 'kertas',
                'product_category_id' => '18'
            ),
            234 => array(
                'name' => 'Buku Tulis',
                'slug' => 'buku-tulis',
                'product_category_id' => '18'
            ),
            235 => array(
                'name' => 'Lain-lain di Office & Stationery',
                'slug' => 'lain-lain-di-office-stationery',
                'product_category_id' => '18'
            ),
            236 => array(
                'name' => 'Pengikat & Perekat',
                'slug' => 'pengikat-perekat',
                'product_category_id' => '18'
            ),
            237 => array(
                'name' => 'Document Organizer',
                'slug' => 'document-organizer',
                'product_category_id' => '18'
            ),
            238 => array(
                'name' => 'Surat Menyurat',
                'slug' => 'surat-menyurat',
                'product_category_id' => '18'
            ),
            239 => array(
                'name' => 'Aksesoris Olahraga',
                'slug' => 'aksesoris-olahraga',
                'product_category_id' => '19'
            ),
            240 => array(
                'name' => 'Olahraga Air',
                'slug' => 'olahraga-air',
                'product_category_id' => '19'
            ),
            241 => array(
                'name' => 'Lain-lain di Olahraga',
                'slug' => 'lain-lain-di-olahraga',
                'product_category_id' => '19'
            ),
            242 => array(
                'name' => 'Alat Pancing',
                'slug' => 'alat-pancing',
                'product_category_id' => '19'
            ),
            243 => array(
                'name' => 'Pakaian Olahraga Pria',
                'slug' => 'pakaian-olahraga-pria',
                'product_category_id' => '19'
            ),
            244 => array(
                'name' => 'Pakaian Olahraga Wanita',
                'slug' => 'pakaian-olahraga-wanita',
                'product_category_id' => '19'
            ),
            245 => array(
                'name' => 'Badminton',
                'slug' => 'badminton',
                'product_category_id' => '19'
            ),
            246 => array(
                'name' => 'Baseball',
                'slug' => 'baseball',
                'product_category_id' => '19'
            ),
            247 => array(
                'name' => 'Panahan',
                'slug' => 'panahan',
                'product_category_id' => '19'
            ),
            248 => array(
                'name' => 'Perlengkapan Lari',
                'slug' => 'perlengkapan-lari',
                'product_category_id' => '19'
            ),
            249 => array(
                'name' => 'Basket',
                'slug' => 'basket',
                'product_category_id' => '19'
            ),
            250 => array(
                'name' => 'Sepak Bola',
                'slug' => 'sepak-bola',
                'product_category_id' => '19'
            ),
            251 => array(
                'name' => 'Beladiri',
                'slug' => 'beladiri',
                'product_category_id' => '19'
            ),
            252 => array(
                'name' => 'Billiard',
                'slug' => 'billiard',
                'product_category_id' => '19'
            ),
            253 => array(
                'name' => 'Sepatu Roda & Skateboard',
                'slug' => 'sepatu-roda-skateboard',
                'product_category_id' => '19'
            ),
            254 => array(
                'name' => 'Sepeda',
                'slug' => 'sepeda',
                'product_category_id' => '19'
            ),
            255 => array(
                'name' => 'Golf',
                'slug' => 'golf',
                'product_category_id' => '19'
            ),
            256 => array(
                'name' => 'Boxing',
                'slug' => 'boxing',
                'product_category_id' => '19'
            ),
            257 => array(
                'name' => 'Gym & Fitness',
                'slug' => 'gym-fitness',
                'product_category_id' => '19'
            ),
            258 => array(
                'name' => 'Tenis',
                'slug' => 'tenis',
                'product_category_id' => '19'
            ),
            259 => array(
                'name' => 'Tenis Meja',
                'slug' => 'tenis-meja',
                'product_category_id' => '19'
            ),
            260 => array(
                'name' => 'Hiking & Camping',
                'slug' => 'hiking-camping',
                'product_category_id' => '19'
            ),
            261 => array(
                'name' => 'Voli',
                'slug' => 'voli',
                'product_category_id' => '19'
            ),
            262 => array(
                'name' => 'Aksesoris Motor',
                'slug' => 'aksesoris-motor',
                'product_category_id' => '20'
            ),
            263 => array(
                'name' => 'Mobil',
                'slug' => 'mobil',
                'product_category_id' => '20'
            ),
            264 => array(
                'name' => 'Oli & Penghemat BBM',
                'slug' => 'oli-penghemat-bbm',
                'product_category_id' => '20'
            ),
            265 => array(
                'name' => 'Perawatan Kendaraan',
                'slug' => 'perawatan-kendaraan',
                'product_category_id' => '20'
            ),
            266 => array(
                'name' => 'Aksesoris Pengendara Motor',
                'slug' => 'aksesoris-pengendara-motor',
                'product_category_id' => '20'
            ),
            267 => array(
                'name' => 'Perkakas Kendaraan',
                'slug' => 'perkakas-kendaraan',
                'product_category_id' => '20'
            ),
            268 => array(
                'name' => 'Sepeda Motor',
                'slug' => 'sepeda-motor',
                'product_category_id' => '20'
            ),
            269 => array(
                'name' => 'Alat Berat',
                'slug' => 'alat-berat',
                'product_category_id' => '20'
            ),
            270 => array(
                'name' => 'Sparepart Mobil',
                'slug' => 'sparepart-mobil',
                'product_category_id' => '20'
            ),
            271 => array(
                'name' => 'Audio & Video Mobil',
                'slug' => 'audio-video-mobil',
                'product_category_id' => '20'
            ),
            272 => array(
                'name' => 'Ban Mobil',
                'slug' => 'ban-mobil',
                'product_category_id' => '20'
            ),
            273 => array(
                'name' => 'Ban Motor',
                'slug' => 'ban-motor',
                'product_category_id' => '20'
            ),
            274 => array(
                'name' => 'Eksterior Mobil',
                'slug' => 'eksterior-mobil',
                'product_category_id' => '20'
            ),
            275 => array(
                'name' => 'Sparepart Motor',
                'slug' => 'sparepart-motor',
                'product_category_id' => '20'
            ),
            276 => array(
                'name' => 'Helm Motor',
                'slug' => 'helm-motor',
                'product_category_id' => '20'
            ),
            277 => array(
                'name' => 'Interior Mobil',
                'slug' => 'interior-mobil',
                'product_category_id' => '20'
            ),
            278 => array(
                'name' => 'Velg Mobil',
                'slug' => 'velg-mobil',
                'product_category_id' => '20'
            ),
            279 => array(
                'name' => 'Velg Motor',
                'slug' => 'velg-motor',
                'product_category_id' => '20'
            ),
            280 => array(
                'name' => 'Grooming Hewan',
                'slug' => 'grooming-hewan',
                'product_category_id' => '21'
            ),
            281 => array(
                'name' => 'Hewan Peliharaan',
                'slug' => 'hewan-peliharaan',
                'product_category_id' => '21'
            ),
            282 => array(
                'name' => 'Perawatan Anjing',
                'slug' => 'perawatan-anjing',
                'product_category_id' => '21'
            ),
            283 => array(
                'name' => 'Perawatan Hewan Ternak',
                'slug' => 'perawatan-hewan-ternak',
                'product_category_id' => '21'
            ),
            284 => array(
                'name' => 'Perawatan Ikan',
                'slug' => 'perawatan-ikan',
                'product_category_id' => '21'
            ),
            285 => array(
                'name' => 'Perawatan Kelinci',
                'slug' => 'perawatan-kelinci',
                'product_category_id' => '21'
            ),
            286 => array(
                'name' => 'Perawatan Kucing',
                'slug' => 'perawatan-kucing',
                'product_category_id' => '21'
            ),
            287 => array(
                'name' => 'Perawatan Reptil',
                'slug' => 'perawatan-reptil',
                'product_category_id' => '21'
            ),
            288 => array(
                'name' => 'Perawatan Ayam',
                'slug' => 'perawatan-ayam',
                'product_category_id' => '21'
            ),
            289 => array(
                'name' => 'Perawatan Burung',
                'slug' => 'perawatan-burung',
                'product_category_id' => '21'
            ),
            290 => array(
                'name' => 'Perawatan Hamster',
                'slug' => 'perawatan-hamster',
                'product_category_id' => '21'
            ),
            291 => array(
                'name' => 'Perlengkapan Hewan',
                'slug' => 'perlengkapan-hewan',
                'product_category_id' => '21'
            ),
            292 => array(
                'name' => 'Grooming',
                'slug' => 'grooming',
                'product_category_id' => '22'
            ),
            293 => array(
                'name' => 'Perawatan Kulit',
                'slug' => 'perawatan-kulit',
                'product_category_id' => '22'
            ),
            294 => array(
                'name' => 'Kesehatan Gigi & Mulut',
                'slug' => 'kesehatan-gigi-mulut',
                'product_category_id' => '22'
            ),
            295 => array(
                'name' => 'Perawatan Mata',
                'slug' => 'perawatan-mata',
                'product_category_id' => '22'
            ),
            296 => array(
                'name' => 'Parfum, Cologne & Fragrance',
                'slug' => 'parfum-cologne-fragrance',
                'product_category_id' => '22'
            ),
            297 => array(
                'name' => 'Perawatan Rambut',
                'slug' => 'perawatan-rambut',
                'product_category_id' => '22'
            ),
            298 => array(
                'name' => 'Perawatan Kaki & Tangan',
                'slug' => 'perawatan-kaki-tangan',
                'product_category_id' => '22'
            ),
            299 => array(
                'name' => 'Perawatan Telinga',
                'slug' => 'perawatan-telinga',
                'product_category_id' => '22'
            ),
            300 => array(
                'name' => 'Perlengkapan Mandi',
                'slug' => 'perlengkapan-mandi',
                'product_category_id' => '22'
            ),
            301 => array(
                'name' => 'Perawatan Kuku',
                'slug' => 'perawatan-kuku',
                'product_category_id' => '22'
            ),
            302 => array(
                'name' => 'Produk Kewanitaan',
                'slug' => 'produk-kewanitaan',
                'product_category_id' => '22'
            ),
            303 => array(
                'name' => 'Alat Ukir',
                'slug' => 'alat-ukir',
                'product_category_id' => '23'
            ),
            304 => array(
                'name' => 'Kerajinan Tangan',
                'slug' => 'kerajinan-tangan',
                'product_category_id' => '23'
            ),
            305 => array(
                'name' => 'Kertas Seni',
                'slug' => 'kertas-seni',
                'product_category_id' => '23'
            ),
            306 => array(
                'name' => 'Balon',
                'slug' => 'balon',
                'product_category_id' => '23'
            ),
            307 => array(
                'name' => 'Lainnya di Perlengkapan Pesta & Craft',
                'slug' => 'lainnya-di-perlengkapan-pesta-craft',
                'product_category_id' => '23'
            ),
            308 => array(
                'name' => 'Bunga',
                'slug' => 'bunga',
                'product_category_id' => '23'
            ),
            309 => array(
                'name' => 'Peralatan Jahit',
                'slug' => 'peralatan-jahit',
                'product_category_id' => '23'
            ),
            310 => array(
                'name' => 'Bungkus Kemasan',
                'slug' => 'bungkus-kemasan',
                'product_category_id' => '23'
            ),
            311 => array(
                'name' => 'Peralatan Melukis',
                'slug' => 'peralatan-melukis',
                'product_category_id' => '23'
            ),
            312 => array(
                'name' => 'Dekorasi Pesta',
                'slug' => 'dekorasi-pesta',
                'product_category_id' => '23'
            ),
            313 => array(
                'name' => 'Peralatan Menggambar',
                'slug' => 'peralatan-menggambar',
                'product_category_id' => '23'
            ),
            314 => array(
                'name' => 'Hadiah',
                'slug' => 'hadiah',
                'product_category_id' => '23'
            ),
            315 => array(
                'name' => 'Perlengkapan Kaligrafi',
                'slug' => 'perlengkapan-kaligrafi',
                'product_category_id' => '23'
            ),
            316 => array(
                'name' => 'Persiapan Pernikahan',
                'slug' => 'persiapan-pernikahan',
                'product_category_id' => '23'
            ),
            317 => array(
                'name' => 'Kebutuhan Pesta',
                'slug' => 'kebutuhan-pesta',
                'product_category_id' => '23'
            ),
        );

        ProductSubCategory::insert($subcategories);
    }
}
