@extends('template.master')
@section('page-title')
<title>Laravel-Blog</title>
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>標題</th>
                    <th>建立時間</th>
                    <th>刪除時間</th>
                    <th>動作</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->deleted_at}}</td>
                    <td>
                        <a href="{{route('trash.restore',['id'=>$post->id])}}" class="btn btn-info">還原</a>
                        <form action="{{route('trash.delete',['id'=>$post->id])}}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="移除" onclick="return confirm('刪除後將無法還原。確定刪除？')">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection