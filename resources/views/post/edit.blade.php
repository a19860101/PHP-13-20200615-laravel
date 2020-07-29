@extends('template.master')
@section('page-title')
<title>Laravel-Blog---新增文章</title>
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('post.update',['id'=>$post->id])}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="儲存">
                <input type="button" class="btn btn-danger" value="取消" onclick="history.back()">
            </form>
        </div>
    </div>
</div>
@endsection