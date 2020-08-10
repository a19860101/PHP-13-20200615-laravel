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
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->deleted_at}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection