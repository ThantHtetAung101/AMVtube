<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amv extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
    public function categories() {
        return $this->belongsTo('App\Models\Category');
    }
    public function users() {
        return $this->belongsTo("App\Models\User");
    }
    public function liked_videos() {
        return $this->hasMany('App\Models\like_video', 'amv_id', 'id');
    }


}
