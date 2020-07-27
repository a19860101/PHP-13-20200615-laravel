@extends('template.master')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="">
                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="送出">
            </form>
        </div>
    </div>
</div>
@endsection