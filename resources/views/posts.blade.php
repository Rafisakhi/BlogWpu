@extends('layout.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                 <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
            @if ($posts[0]->image)
                <div style="max-height: 350px; overflow:hidden;" >
                    <img src="{{ asset('storage/'. $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid mt-3">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
            @endif
        <div class="card mb-3 text-center">
            <div class="card-body">
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"><h3 class="card-title">{{ $posts[0]->title }}</h3></a>

                 <p>
                   <small class="text-muted">
                    By <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name  }}</a> in <a href="/posts?category={{ $posts[0]->category->slug  }}" class="text-decoration-none">{{$posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                   </small>
                </p>

                <p class="card-text">{{ $posts[0]->excerpt }}</p>
               <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More..</a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $pos )
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(112, 105, 105, 0.7)"><a href="/posts?category={{ $pos->category->slug }}" class="text-decoration-none text-white">{{ $pos->category->name }}</a></div>

                                        @if ($pos->image)
                                                <img src="{{ asset('storage/'. $pos->image) }}" alt="{{ $pos->category->name }}" class="img-fluid">
                                        @else
                                             <img src="https://source.unsplash.com/500x400?{{ $pos->category->name }}" class="card-img-top" alt="{{ $pos->category->name }}">
                                        @endif


                    <div class="card-body">
                        <h5 class="card-title">{{ $pos->title }}</h5>
                        <p>
                            <small class="text-muted">
                                By <a href="/posts?author={{ $pos->author->username }}" class="text-decoration-none">{{ $pos->author->name  }}</a> in <a href="/categories/{{ $pos->category->slug  }}" class="text-decoration-none">{{$pos->category->name }}</a> {{ $pos->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ $pos->excerpt }}<p>
                        <a href="/posts/{{ $pos->slug }}" class="btn btn-primary">Read more..</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No Post Found..</p>
    @endif

    <div class="d-flex justify-content-end">
       {{ $posts->links() }}
    </div>


{{-- @foreach ( $posts->skip(1) as $pos )

    <article class=" mb-5 pb-3 border-bottom">
        <h2>
            <a href="/posts/{{ $pos->slug }}" class="text-decoration-none">{{ $pos->title }}</a>
        </h2>
        <p>By <a href="/author/{{ $pos->author->username }}" class="text-decoration-none">{{    $pos->author->name  }}</a> in <a href="/categories/{{  $pos->category->slug  }}" class="text-decoration-none">{{  $pos->category->name }}</a></p>

        <p>{{ $pos->excerpt  }}</p>

        <a href="/posts/{{  $pos->slug  }}" class="text-decoration-none">Read more..</a>
    </article>
@endforeach --}}
@endsection
