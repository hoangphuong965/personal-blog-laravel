@extends('front.layout.app')
@section('main_content')
    <div class="container">
        <h3>Blog Update</h3>
        <form action="{{ route('article.update', ['article' => $article->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control id="title" name="title" value="{{ $article->title }}">
                @error('title')
                    <p style="color: brown">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label>Current Feature Image *</label>
                <div>
                    <img src="{{ asset('uploads/' . $urlImage) }}" alt="" style="width:300px;">
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Feature image *</label>
                <input type="file" class="form-control" name="FeatureImage">
                @error('FeatureImage')
                    <p style="color: brown">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="content" class="form-label">Categories *</label>
                <select class="form-control" name="category">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <p style="color: brown">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Contents *</label>
                <textarea class="summernote" name="content">{{ $article->content }}</textarea>
                @error('content')
                    <p style="color: brown">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Status *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1"
                        checked>
                    <label class="form-check-label" for="flexRadioDefault1">Public</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0">
                    <label class="form-check-label" for="flexRadioDefault2">Draft</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
@endsection
