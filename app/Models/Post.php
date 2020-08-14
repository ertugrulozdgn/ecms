<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getUserAttribute()
    {
        return User::find($this->user_id)->get();
    }

    public function getCategoryAttribute()    //burada bişey var use app\models\cateogry oluştursakta işe yaramıyor
    {
        return Category::find($this->category_id)->get();
    }
}
