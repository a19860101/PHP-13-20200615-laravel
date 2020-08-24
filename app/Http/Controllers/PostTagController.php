<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
class PostTagController extends Controller
{
    //

    public function postsWithTag(Tag $tag){       
        $posts = $tag->posts;
        // return $posts;
        return $posts;
    }

}
