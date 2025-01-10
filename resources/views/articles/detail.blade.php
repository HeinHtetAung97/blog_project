@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 600px">
        @if (session("error"))
            <div class="alert alert-warning">
                {{session("error")}}
            </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class=" card-title">{{ $article->title}}</h3>
                <div class=" card-subtitle text-muted small mb-2">
                    <b>{{ $article->user->name}}</b>
                    <b>Category:{{$article->category->name}}</b>
                    {{ $article->created_at->diffForHumans()}}
                </div>
                <p class="text-muted mb-4">{{ $article->body}}</p>
                @auth
                    <a href="{{ url("articles/delete/$article->id")}}" class="btn btn-sm btn-outline-danger">Delete</a>
                    <a href="{{ url("articles/edit/$article->id")}}" class="btn btn-sm btn-outline-primary">Edit</a>
                @endauth
            </div>
        </div>
        <div>
            <ul class="list-group mt-2">
                <li class=" list-group-item active">Comment ({{ count($article->comments)}})</li>
                @foreach ($article->comments as $comment )
                    <li class=" list-group-item">
                        @auth
                            <a href="{{ url("comment/delete/$comment->id")}}" class=" btn-close float-end"></a>
                        @endauth
                        {{ $comment->content}}
                        <div class=" small mt-2">
                            By <b>{{ $comment->user->name}}</b>,
                            {{ $article->created_at->diffForHumans()}}
                        </div>
                    </li>
                @endforeach
            </ul>
            @auth
                <form action="{{ url("comments/add")}}" method="POST">
                    @csrf
                    <input type="hidden" name="article_id" value="{{ $article->id}}">
                    <textarea name="content" class=" form-control" placeholder="Comment..."></textarea>
                    <input type="submit" class="btn btn-outline-secondary">
                </form>
            @endauth
        </div>
    </div>
@endsection
