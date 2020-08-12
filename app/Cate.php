<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $fillable = ['title','slug'];
    public function post(){
        return $this->hasMany('App\Post');
    }
}
