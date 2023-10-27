@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="max-width:700px">
        @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control mb-3">
            <input type="text" name="title" class="form-control mb-3" placeholder="Title">
            <input type="text" name="paragh" class="form-control mb-3" placeholder="Paragraph">
            <button class="btn btn-primary w-100 btn-sm">Add Article</button>
        </form>
    </div>
@endsection
