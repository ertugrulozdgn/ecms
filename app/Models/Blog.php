<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{

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
