@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px">
        <div class="card mb-5">
           <ul class="list-group">
            @foreach ($article->comments as $comment)
            <li class="list-group-item">
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
    </div>
@endsection
