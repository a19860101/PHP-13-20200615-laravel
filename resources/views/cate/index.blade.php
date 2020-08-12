@extends('template.master')
@section('page-title')
<title>分類管理</title>
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>新增分類</h2>
            <form action="{{route('cate.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">分類名稱</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                <input type="submit" class="btn btn-primary" value="新增分類">
            </form>
        </div>
        <div class="col-md-4">
            <h2>分類列表</h2>
            <ul class="list-group">
                @foreach($cates as $cate)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$cate->title}}
                    <form action="" method="post">
                        @csrf
                        @method('post')
                        <input type="submit" value="刪除" class="btn btn-danger" onclick="return confirm('確認刪除?')">
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection