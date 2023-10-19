@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif
        <div class="card mb-5">
           <ul class="list-group">
            @foreach ($article->comments as $comment)
            <li class="list-group-item">
                @auth
                    @can('comment-delete', $comment)
                    <a href="{{url("/comments/delete/$comment->id")}}" class="btn btn-sm btn-close float-end ms-3"></a>
                    @endcan
                @endauth
                {{ $comment->content }}
                <small class="float-end"><b>By: {{ $comment->user->name }}</b></small>
            </li>
            @endforeach
           </ul>
        </div>

        <form action="{{url("/comments/add")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input type="hidden" name="article_id" value="{{$article->id}}" class="form-control mb-2">
                <input type="text" name="content" placeholder="Comment As {{auth()->user()->name}}" class="form-control">
                <button class="btn btn-sm btn-primary">Add Comment</button>
            </div>
        </form>
        <a href="{{url("/articles/detail/$article->id")}}" class="btn btn-primary mt-3">Go back</a>
    </div>
@endsection
