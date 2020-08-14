<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title' => 'Güncel' , 'slug' => 'guncel' , 'status' => 1 ]);
        Category::create(['title' => 'Oyun' , 'slug' => 'oyun' , 'status' => 1 ]);
        Category::create(['title' => 'Mobil' , 'slug' => 'mobil' , 'status' => 1 ]);
        Category::create(['title' => 'Otomobil' , 'slug' => 'otomobil' , 'status' => 1 ]);
        Category::create(['title' => 'Bİlim & Teknik' , 'slug' => 'bilim-teknik' , 'status' => 1 ]);
        Category::create(['title' => 'Donanım' , 'slug' => 'donanım' , 'status' => 1 ]);
        Category::create(['title' => 'Sosyal Medya' , 'slug' => 'sosyal-medya' , 'status' => 1 ]);
        Category::create(['title' => 'İnceleme' , 'slug' => 'inceleme' , 'status' => 1 ]);
        Category::create(['title' => 'Sinema' , 'slug' => 'sinema' , 'status' => 1 ]);
        Category::create(['title' => 'Yazılım' , 'slug' => 'yazilim' , 'status' => 1 ]);
        Category::create(['title' => 'İnternet' , 'slug' => 'internet' , 'status' => 1 ]);
        Category::create(['title' => 'Güvenlik' , 'slug' => 'güvenlik' , 'status' => 1 ]);
        Category::create(['title' => 'Eğitim' , 'slug' => 'egitim' , 'status' => 1 ]);
    }
}
