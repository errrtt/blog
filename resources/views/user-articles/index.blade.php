@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {{$articles->links()}}
        <table class="table table-dark table-striped table-bordered">
            <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Paragraph</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
            @foreach ($articles as $article)
                @if ($article->user_id == auth()->user()->id)
                <tr>
                    <td><img src="{{asset('storage/img/' . $article->photo)}}" width="200" height="200"></td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->paragraph }}</td>
                    <td>{{ $article->created_at->diffForHumans() }}</td>
                    <td>{{ $article->updated_at->diffForHumans() }}</td>
                </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection
