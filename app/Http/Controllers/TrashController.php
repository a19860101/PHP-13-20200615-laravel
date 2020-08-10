<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;


class TrashController extends Controller
{
    //
    public function index(){
        $posts = Post::onlyTrashed()->get();
        return view('trash.index',compact('posts'));
    }
    public function restore($id){
        $post = Post::onlyTrashed()->find($id);
        $post->restore();
        return redirect('trash');
    }
    public function destroy(Request $request){
        Storage::delete('public/images/'.$request->cover);
        $post = Post::onlyTrashed()->find($request->id);
        $post->forceDelete();
        return redirect('trash');
    }
}
