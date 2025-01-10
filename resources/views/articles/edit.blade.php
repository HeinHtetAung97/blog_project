@extends('layouts.app')
@section('content')
<div class="container" style="max-width: 600px">
    <form method="POST" class="my-5 p-3 border shadow-sm">
        <h3 class="text-center my-3">Edit Article</h3>
        @csrf
        <label for="title" class="form-label">Title</label>
        <input type="text" class=" form-control mb-3" name="title" value="{{ $article->title}}">
        <label for="body" class="form-label">Body</label>
        <textarea name="body" class=" form-control mb-3">{{ $article->body}}</textarea>
        <label for="category_id">Category</label>
        <select name="category_id" class="form-select mb-3">
            @foreach ($categories as $category )
                <option value="{{ $category->id}}" selected> {{$category->name}}</option>
            @endforeach
        </select>
        <button class="btn btn-outline-primary my-3">Update</button>
    </form>
</div>
@endsection
