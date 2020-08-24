<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
class PostTagController extends Controller
{
    //

    function postsWithTag($id){
        $tags = Tag::findOrFail($id);
        return $tags;
    }
}
