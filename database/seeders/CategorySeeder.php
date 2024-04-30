<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Devlet Konservatuvarı.firat.edu.tr'],
            ['id' => 2, 'name' => 'Diş Hekimliği Fakültesi.firat.edu.tr'],
            ['id' => 3, 'name' => 'Eğitim Fakültesi.firat.edu.tr'],
            ['id' => 4, 'name' => 'Fen Fakültesi.firat.edu.tr'],
            ['id' => 5, 'name' => 'İnsani ve Sosyal Bilimler Fakültesi.firat.edu.tr'],
            ['id' => 6, 'name' => 'İktisadi ve İdari Bilimler Fakültesi.firat.edu.tr'],
            ['id' => 7, 'name' => 'İlahiyat Fakültesi.firat.edu.tr'],
            ['id' => 8, 'name' => 'İletişim Fakültesi.firat.edu.tr'],
            ['id' => 9, 'name' => 'Mimarlık Fakültesi.firat.edu.tr'],
            ['id' => 10, 'name' => 'Mühendislik Fakültesi.firat.edu.tr'],
            ['id' => 11, 'name' => 'Sağlık Bilimleri Fakültesi.firat.edu.tr'],
            ['id' => 12, 'name' => 'Sivil Havacılık Yüksek Okulu.firat.edu.tr'],
            ['id' => 13, 'name' => 'Su Ürünleri Fakültesi.firat.edu.tr'],
            ['id' => 14, 'name' => 'Spor Bilimleri Fakültesi.firat.edu.tr'],
            ['id' => 15, 'name' => 'Teknoloji Fakültesi.firat.edu.tr'],
            ['id' => 16, 'name' => 'Teknik Eğitim Fakültesi.firat.edu.tr'],
            ['id' => 17, 'name' => 'Tıp Fakültesi.firat.edu.tr'],
            ['id' => 18, 'name' => 'Yabancı Diller Yüksek Okulu.firat.edu.tr'],
            ['id' => 19, 'name' => 'Veterinerlik Fakültesi.firat.edu.tr'],
            ['id' => 20, 'name' => 'Baskil Meslek Yüksekokulu.firat.edu.tr'],
            ['id' => 21, 'name' => 'Beden Eğitimi ve Spor Yüksek Okulu.firat.edu.tr'],
            ['id' => 22, 'name' => 'Eğitim Bilimleri Enstitüsü.firat.edu.tr'],
            ['id' => 23, 'name' => 'Elazığ Organize Sanayi Bölgesi Meslek Yüksek Okulu.firat.edu.tr'],
            ['id' => 24, 'name' => 'Elazığ Sağlık Yüksek Okulu.firat.edu.tr'],
            ['id' => 25, 'name' => 'Fen Bilimleri Enstitüsü.firat.edu.tr'],
            ['id' => 26, 'name' => 'Karakoçan Meslek Yüksek Okulu.firat.edu.tr'],
            ['id' => 27, 'name' => 'Keban Meslek Yüksek Okulu.firat.edu.tr'],
            ['id' => 28, 'name' => 'Kovancılar Meslek Yüksek Okulu.firat.edu.tr'],
            ['id' => 29, 'name' => 'Rektörlük.firat.edu.tr'],
            ['id' => 30, 'name' => 'Sağlık Bilimleri Enstitüsü.firat.edu.tr'],
            ['id' => 31, 'name' => 'Sağlık Hizmetleri Meslek Yüksek Okulu.firat.edu.trv'],
            ['id' => 32, 'name' => 'Sivrice Meslek Yüksek Okulu.firat.edu.tr'],
            ['id' => 33, 'name' => 'Sosyal Bilimler Enstitüsü.firat.edu.tr'],
            ['id' => 34, 'name' => 'Sosyal Bilimler Meslek Yüksek Okulu.firat.edu.tr'],
            ['id' => 35, 'name' => 'Teknik Bilimler Meslek Yüksek Okulu.firat.edu.tr'],
            ['id' => 36, 'name' => 'GENEL.firat.edu.tr']

        ]);
    }
}
