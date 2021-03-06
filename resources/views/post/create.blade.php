@extends('template.master')
@section('page-title')
<title>Laravel-Blog---新增文章</title>
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="tag">標籤</label>
                    <input type="text" name="tag" id="tag" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cover">封面圖片</label>
                    <input type="file" name="cover" id="cover">
                </div>
                <div class="form-group">
                    <label for="cate_id">分類</label>
                    <select name="cate_id" id="cate_id" class="form-control">
                        @foreach($cates as $cate)
                        <option value="{{$cate->id}}">{{$cate->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="送出">
            </form>
        </div>
        
        @if($errors -> any())
        <div class="col-12">
            @foreach($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection