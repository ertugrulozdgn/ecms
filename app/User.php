<?php

namespace App;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password',];

    protected $hidden = ['password', 'remember_token',];


    public function blogs()
    {
        return Blog::where('user_id',$this->id)->get();
    }


    public function pages()
    {
        return Page::where('user_id',$this->id)->get();
    }


    public function sliders()
    {
        return Slider::where('user_id',$this->id)->get();
    }


    protected $casts = ['email_verified_at' => 'datetime',];

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'Aktif';
                break;
            case 0:
                return 'Pasif';
                break;
            default:
                return ' Pasif';
                break;
        }
    }


    public function getRoleNameAttribute() {
        switch ($this->role) {
            case 'admin':
                return 'Yetkili';
                break;
            case 'user':
                return 'Kullanıcı';
                break;
            default:
                return 'Kullanıcı';
                break;
        }
    }

}
