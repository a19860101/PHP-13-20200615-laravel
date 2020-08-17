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
                    <label for="tag">標籤</label>
                    <input type="text" name="tag" id="tag" class="form-control" value="{{$post->toTagString()}}">
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="cate_id"></label>
                    <select name="cate_id" id="cate_id" class="form-control">
                        @foreach($cates as $cate)
                            @if($cate->id === $post->cate_id)
                            <option value="{{$cate->id}}" selected>{{$cate->title}}</option>
                            @else
                            <option value="{{$cate->id}}">{{$cate->title}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="儲存">
                <input type="button" class="btn btn-danger" value="取消" onclick="history.back()">
            </form>
        </div>
    </div>
</div>
@endsection