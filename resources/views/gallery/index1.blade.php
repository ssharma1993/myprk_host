@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Gallery</h1>
        </div>
        <div class="col-md-4 text-end">
            @auth
            <a href="{{ route('gallery.create') }}" class="btn btn-primary">Upload Image</a>
            @endauth
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (count($galleries) > 0)
    <div class="row">
        @foreach ($galleries as $gallery)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset($gallery->image_path) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    @if ($gallery->description)
                    <p class="card-text text-muted">{{ Str::limit($gallery->description, 100) }}</p>
                    @endif
                </div>
                @auth
                <div class="card-footer bg-transparent">
                    <a href="{{ route('gallery.edit', $gallery) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('gallery.destroy', $gallery) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info">
        No images in gallery yet. @auth<a href="{{ route('gallery.create') }}">Upload your first image</a>@endauth
    </div>
    @endif
</div>
@endsection