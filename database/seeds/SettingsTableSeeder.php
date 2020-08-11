<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(["key" => "Logo", "value" => null,"type" => "file"]);
        Setting::create(["key" => "Title", "value" => "Laravel Blog","type" => "text"]);
        Setting::create(["key" => "Description", "value" => "Laravel Blog Sayfası Açıklama","type" => "text"]);
        Setting::create(["key" => "Keywords", "value" => "laravel,blog","type" => "text"]);
        Setting::create(["key" => "Author", "value" => "Ertuğrul Özdoğan","type" => "text"]);
        Setting::create(["key" => "Phone", "value" => "0535 297 06 16","type" => "text"]);
        Setting::create(["key" => "Email", "value" => "ozdgnertugrul@gmail.com","type" => "text"]);
        Setting::create(["key" => "Address", "value" => "Kahramanmaraş","type" => "text"]);
        Setting::create(["key" => "Facebook", "value" => "www.facebook.com","type" => "text"]);
        Setting::create(["key" => "Twitter", "value" => "www.twitter.com","type" => "text"]);
        Setting::create(["key" => "Youtube", "value" => "www.youtube.com","type" => "text"]);
        Setting::create(["key" => "Footer" , "value" =>"BLOGtr 2020" , "type" => "text"]);
        Setting::create(["key" => "Working", "value" => "Hafta içi hergün 9:00-17:00", "type" => "text"]);

    }
}
