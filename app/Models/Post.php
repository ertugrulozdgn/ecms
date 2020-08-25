<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = [
        'created_at','published_at','updated_at'
    ];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }


//    public function getUserAttribute()
//    {
//        return User::find($this->user_id);
//    }


    public function getLinkAttribute()
    {
        return action('Web\Post\NewsController@show',['slug' => $this->slug, 'id' => $this->id]); //$post->link
    }

    public function getCategoryAttribute()    //burada bişey var use app\models\cateogry oluştursakta işe yaramıyor
    {
        return Category::find($this->category_id);
    }


    public function getLocationNameAttribute()
    {
        $locations = [
            1 => 'normal',
            2 => 'manşet'
        ];

        return $locations[$this->location] ?? 'normal';

        // switch ($this->location)
        // {
        //     case 1:
        //         return 'normal';
        //         break;

        //     case 2:
        //         return 'manşet';
        //         break;

        //     default:
        //         return 'normal';
        //         break;
        // }

    }
}
