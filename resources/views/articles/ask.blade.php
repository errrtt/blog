@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="max-width: 700px">
        <div class="text-center">
            <h1>Are you sure want to delete this article ?</h1>
        </div>
        <div class="mt-5">
            <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-danger w-100 mb-2">Yes</a>
            <a href="{{url("/articles/detail/$article->id")}}" class="btn btn-primary w-100">No</a>
        </div>
    </div>
@endsection
