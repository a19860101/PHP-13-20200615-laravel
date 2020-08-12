<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //建立白名單
    protected $fillable = ['title','content'];

    use SoftDeletes;

    public function user(){

        return $this->belongsTo('App\User');
    
    }
}
