@extends('template.master')
@section('page-title')
<title>Laravel-Blog</title>
@endsection
@section('main')
<div class="container">

    @foreach($posts as $post)
    <div class="row justify-content-center my-5 border p-5 align-items-center">
        <div class="col-4">
            <img src="/storage/images/{{$post->cover}}" class="w-100">
        </div>
        <div class="col-8">
            <h2>{{$post->title}}</h2>
            <div>分類: {{$post->cate->title}}</div>
            <div>作者:{{$post->user->name}} / {{$post->user->email}}</div>
            <a href="/post/{{$post->id}}">
                <!-- 檢視2 -->
            </a>
            <a href="{{route('post.show',['id'=>$post->id])}}" class="btn btn-primary">
                檢視
            </a>
            <div class="w-100 my-3"></div>
            @foreach($post->tags as $tag)
            <a href="{{route('postsTag',['id'=>$tag->id])}}" class="btn btn-danger btn-sm">{{$tag->title}}</a>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection