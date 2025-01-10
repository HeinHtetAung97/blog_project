@extends('layouts.app')
@section('content')
<div class="container" style="max-width: 800px">
    @if ($errors->any())
        <div class="alert alert-warning">
           <ol>
                @foreach ($errors->all() as $error )
                    <li>{{ $error}}</li>
                @endforeach
           </ol>
        </div>
    @endif
    <form method="POST" class=" my-5 border shadow-sm p-3">
        @csrf
        <h3 class="text-center my-3">Create Article</h3>
        <div class="mb-3">
            <label for="title" class=" form-label">Title</label>
            <input type="text" class=" form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="body" class=" form-label">Body</label>
            <textarea name="body" class=" form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" class=" form-control">
                @foreach ($categories as $category )
                    <option value="{{ $category->id}}"> {{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary my-3">Create</button>
    </form>
</div>
@endsection
