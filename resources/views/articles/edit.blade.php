@extends('layouts.app')

@section('content')
    <div class="container" style="max-width:700px">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <img src="{{asset('storage/img/' . $article->photo)}}" width="100" height="100">
            <input type="file" name="file" class="form-control mb-3 mt-1">
            <input type="text" name="title" class="form-control mb-3" value="{{ $article->title}}">
            <textarea name="paragh" cols="30" rows="20" class="form-control mb-3">{{ $article->paragraph }}</textarea>
            <button class="btn btn-primary w-100 btn-sm">Edit</button>
        </form>
    </div>
@endsection
