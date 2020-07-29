@extends('template.master')
@section('page-title')
<title>文章內容</title>
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
                建立時間:{{$post->created_at}}
            </div>
            <div>
                最後更新時間:{{$post->updated_at}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection