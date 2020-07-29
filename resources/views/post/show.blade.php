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
            <a href="/post" class="btn btn-primary">回上頁</a>
            <form action="{{route('post.destroy',['id'=>$post->id])}}" method="post" class="d-inline-block">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="刪除" onclick="return confirm('確認刪除？')">
            </form>
            <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-info">編輯</a>
        </div>
        @endforeach
    </div>
</div>
@endsection