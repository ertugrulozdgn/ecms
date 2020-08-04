<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function getStatusNameAttribute() { //$slider->status_name

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
