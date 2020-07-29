@extends('template.master')
@section('page-title')
<title>Laravel-Blog</title>
@endsection
@section('main')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-12">
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