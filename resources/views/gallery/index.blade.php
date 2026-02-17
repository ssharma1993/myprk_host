@extends('layouts.app')

@section('title','Gallery')

@section('content')
<section class="section-space">
    <div class="container">
        <div class="sec-title">
            <h2 class="sec-title__title">Gallery</h2>

        </div>
        @if (count($galleries) > 0)
        <div class="row">
            @foreach ($galleries as $gallery)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm cursor-pointer gallery-card" data-bs-toggle="modal"
                    data-bs-target="#imageModal"
                    onclick="openImageModal({{ $gallery->id }}, '{{ $gallery->title }}', '{{ $gallery->description ?? '' }}', '{{ asset($gallery->image_path) }}')">
                    <img src="{{ asset($gallery->image_path) }}" class="card-img-top"
                        alt="{{ $gallery->title }}" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        @if ($gallery->description)
                        <p class="card-text text-muted">{{ Str::limit($gallery->description, 100) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info">
            No images in gallery yet.
        </div>
        @endif

        <!-- Image Preview Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title" id="modalTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img id="modalImage" src="" alt="" class="w-100">
                    </div>
                    <div class="modal-footer border-top flex-column align-items-start" id="modalFooter">
                        <div class="w-100" id="modalDescription"></div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .gallery-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .gallery-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
            }

            .modal-body img {
                max-height: 70vh;
                overflow: auto;
            }
        </style>

        <script>
            function openImageModal(id, title, description, imagePath) {
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalImage').src = imagePath;
                document.getElementById('modalImage').alt = title;

                const descriptionDiv = document.getElementById('modalDescription');
                if (description) {
                    descriptionDiv.innerHTML = '<p class="text-muted mb-0">' + description + '</p>';
                } else {
                    descriptionDiv.innerHTML = '';
                }
            }
        </script>
    </div>
</section>
@endsection