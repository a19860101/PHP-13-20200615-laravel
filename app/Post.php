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
    public function cate(){
        return $this->belongsTo('App\Cate');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function toTagString(){
        $tagTitle = [];
        foreach($this->tags as $tag){
             $tagTitle[] = $tag->title;
        }
        $tagString = implode(',',$tagTitle);
        return $tagString;
    }
}
