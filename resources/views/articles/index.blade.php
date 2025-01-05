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
    @foreach ($articles as $article )
        <div class="card my-2">
            <div class="card-body">
                <h3>{{ $article->title}}</h3>
                <p class=" text-muted">{{ $article->body}}</p>
                <a href="{{ url("articles/detail/$article->id")}}" class=" card-link text-decoration-none">View detail &raquo</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
