@extends('template.master')
@section('page-title')
<title>Laravel-Blog</title>
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center">
        @foreach($posts as $post)
        <div class="col-8">
            <img src="/storage/images/{{$post->cover}}" class="w-100">
            <div>作者:{{$post->user->name}}</div>
            <div>Mail:{{$post->user->email}}</div>
            <div>分類: {{$post->cate->title}}</div>
            <h2>{{$post->title}}</h2>
            <a href="{{route('post.show',['id'=>$post->id])}}">
                檢視1
            </a>
            <a href="/post/{{$post->id}}">
                檢視2
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection