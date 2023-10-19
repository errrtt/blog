@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif
        <div class="row">
            {{ $articles->links()}}
            @foreach ($articles as $article)
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div>
                            @if ($article->photo)
                                <img src="{{ asset('storage/img/' . $article->photo)}}" style="width: 100%; height: 200px;" class="img-fluid">
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="card-title mb-3">
                                <h5><b>{{ $article->title}}</b></h5>
                            </div>
                            <div class="card-subtitle">
                                <span>
                                    <i class="fa-solid fa-user" style="color: #01276d;"></i>
                                     <small class="ms-1"><b>{{$article->user->name}}</b></small>
                                     <small class="text-success float-end">Comments : {{ count($article->comments) }}</small>
                                </span>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{url("/articles/detail/$article->id")}}" class="btn btn-primary btn-sm">See more</a>
                            <small class="float-end mt-2">{{$article->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
