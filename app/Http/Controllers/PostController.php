<?php

namespace App\Http\Controllers;

use App\Post;
use App\Cate;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::limit('2')->orderBy('id','DESC')->get();
        $posts = Post::orderBy('id','DESC')->get();
        // $posts = Post::get();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cates = Cate::all();
        return view('post.create',compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //方法一
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        //方法二
        // $post = new Post;
        // $post->fill($request->all());
        // $post->save();

        //方法三
        // $post = new Post;
        // $post->fill([
        //     'title' => $request->title,
        //     'content'=>$request->content
        // ]);
        // $post->save();
        // return redirect('post');

        // return $request->file('cover')->store('images','public');

        //Validate
        $request->validate([
            'title'     => 'required | max:100',
            'cover'     => 'required',
            'content'   => 'required'
        ]);


        $cover_ext = $request->file('cover')->getClientOriginalExtension();
        $cover_name = md5(time()).'.'.$cover_ext;
        $request->file('cover')->storeAs('/public/images',$cover_name);

        $post = new Post;
        $post->fill($request->all());
        $post->cover = $cover_name;
        $post->user_id = Auth::id();
        $post->cate_id = $request->cate_id;
        $post->save();
        
        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title'=> $tag]);
            $post->tags()->attach($tagModel->id);
        }
        
        return redirect('post');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        // $post = Post::where('id',$post->id)->first();
        // $post = Post::find($post->id);
        $post = Post::findOrFail($post->id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $post = Post::findOrFail($post->id);
        $cates = Cate::all();
        return view('post.edit',compact('post','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post = Post::findOrFail($post->id);
        $post->fill($request->all());
        $post->cate_id = $request->cate_id;
        // $post->fill([
        //     'title' => $request->title,
        //     'content'=> $request->content
        // ]);
        $post->save();

        $post->tags()->detach();
        
        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title'=> $tag]);
            $post->tags()->attach($tagModel->id);
        }
        


        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        // $post = Post::findOrFail($post->id);
        // $post->delete();
        // Storage::delete('public/images/'.$post->cover);
        Post::destroy($post->id);

        return redirect('post');
    }
}
