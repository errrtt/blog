@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 1000px">
        <div class="text-center mb-3">
            @if (session('info'))
                <div class="alert alert-info">{{ session('info') }}</div>
            @endif
        </div>

        <img src="{{asset('storage/img/' . $article->photo)}}" style="width: 100%; height:300px" class="img-fluid rounded-2">
        <div class="text-center mt-5">
            <h2>{{$article->title}}</h2>
        </div>
        <div style="margin-top: 20px">
            <p style="line-height: 33px; font-size: 20px">
                {{$article->paragraph}}
            </p>
        </div>
        <div class="mt-5">
            <span class="me-5">
                <b><i>Written By : {{$article->user->name}} ,</i></b>
                <small><b>{{$article->created_at->diffForHumans()}}</b></small>
            </span>

                @auth
                <a href="{{url('/articles')}}" class="btn btn-outline-primary me-1">Go Back</a>
                    @can('article-delete', $article)
                        <div class="btn-group">
                            <a href="{{url("/articles/ask/$article->id")}}" class="btn btn-outline-danger">Delete</a>
                            <a href="{{url("/articles/edit/$article->id")}}" class="btn btn-outline-success">Edit</a>
                        </div>
                    @endcan
                    <a href="{{url("/articles/comments/$article->id")}}" class="btn btn-outline-secondary">Add Comment</a>
                @endauth

        </div>
    </div>
@endsection
