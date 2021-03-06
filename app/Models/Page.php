<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
//    public function getUserAttribute()
//    {
//        return User::find($this->user_id);
//    }


    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }


    public function getLinkAttribute()
    {
        return action('Web\PageController@show', ['slug' => $this->slug, 'id' => $this->id]); //$page->link
    }


    public function getStatusNameAttribute()  //$page->status_name
    {

        switch ($this->status) {
            case 1 :
                return 'Aktif';
                break;
            case 0:
                return 'Pasif';
                break;
            default:
                return'Aktif';
                break;
        }
    }
}
