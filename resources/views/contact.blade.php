@extends('layouts.app')

@section('title','Contact')

@section('content')
<section class="section-space">
    <div class="container">
        <div class="sec-title">
            <h2 class="sec-title__title">Contact Us</h2>
            <p>Get in touch using the form below.</p>
        </div>
        <div class="row">
            <div class="col-lg-8">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Please fix the following errors:</h4>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Your Name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            placeholder="Your Email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                            placeholder="Message" rows="6" required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Send</button>
                </form>
            </div>
            <div class="col-lg-4">
                <h4>Contact Info</h4>
                <p>Phone: {{ config('company.phone') }}</p>
                <p>Email: {{ config('company.email') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection