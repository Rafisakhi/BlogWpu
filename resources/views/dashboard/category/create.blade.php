@extends('dashboard.layout.main')

@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Category</h1>
    </div>
<div class="col-lg-8">
    <form action="/dashboard/categories" method="post" class="mb-3" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Name Category</label>
            <input type="text" class="form-control @error('title')
                is-invalid
            @enderror" id="name" name="name" value="{{ old('title') }}" required autofocus>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="slug" class="form-control @error('slug')
                is-invalid
            @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>

</div>

<script>
    const title = document.querySelector('#name')
    const slug = document.querySelector('#slug')

    title.addEventListener('change', function() {
        fetch('/dashboard/categories/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });


</script>
@endsection
