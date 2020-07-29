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
            <div>
                {{$post->content}}
            </div>
            <div>
                {{$post->created_at}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection