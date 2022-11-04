<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like_video extends Model
{
    use HasFactory;
    public function amvs() {
        return $this->hasMany('App\Models\Amv', 'id','amv_id');
    }
}
