@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 600px">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="mb-3">{{ $article->title}}</h3>
                <p class="text-muted mb-4">{{ $article->body}}</p>
                <a href="{{ url("articles/delete/$article->id")}}" class="btn btn-sm btn-outline-danger">Delete</a>
                <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
