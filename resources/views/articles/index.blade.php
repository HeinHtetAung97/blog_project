@extends('layouts.app')
@section('content')
<div class="container" style="max-width: 800px">
    <div>
        {{$articles->links()}}
    </div>
    @if (session("delete"))
        <div class="alert alert-warning">
            {{ session("delete")}}
        </div>
    @endif

    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info")}}
        </div>
    @endif
    @foreach ($articles as $article )
        <div class="card my-2">
            <div class="card-body">
                <h3>{{ $article->title}}</h3>
                <div class=" card-subtitle text-muted small mb-2">
                    <b>{{ $article->user->name}}</b>
                    Comment ({{ count($article->comments)}})
                    {{ $article->created_at->diffForHumans()}}
                </div>
                <p class=" text-muted">{{ $article->body}}</p>
                <a href="{{ url("articles/detail/$article->id")}}" class=" card-link text-decoration-none">View detail &raquo</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
