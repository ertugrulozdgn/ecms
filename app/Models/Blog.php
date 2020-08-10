<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use PharIo\Manifest\Extension;

class Blog extends Model
{
    public function getUserAttribute() //$blog->user
    {
        return User::find($this->user_id);
    }


    public function getLinkAttribute()
    {
        return route('frontend.blog.Detail',['slug' => $this->slug, 'id' => $this->id]);  //$blog->link
    }


    public function getStatusNameAttribute() { //$blog->status_name

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
