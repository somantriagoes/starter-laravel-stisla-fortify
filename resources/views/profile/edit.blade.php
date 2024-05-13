@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12">
          <div class="card">
            <form method="POST" action="{{route('user-profile-information.update')}}" class="needs-validation" novalidate="">
              @method('PUT')
              @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-7 col-12">
                      <label>Name</label>
                      <input type="text" class="form-control @error('name')
                          is-invalid
                      @enderror" name="name" value="{{ auth()->user()->name }}">
                      @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-7 col-12">
                      <label>Email</label>
                      <input type="email" class="form-control @error('email')
                      is-invalid
                      @enderror" name="email" value="{{ auth()->user()->email }}">
                      @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group col-md-5 col-12">
                      <label>Phone</label>
                      <input type="tel" class="form-control @error('phone')
                          is-invalid
                      @enderror" name="phone" value="{{ auth()->user()->phone }}">
                      @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="address">Address</label>
                      <input type="text" class="form-control @error('address')
                          is-invalid
                      @enderror" name="address" value="{{ auth()->user()->address }}">
                      @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="address">Bio</label>
                      <textarea class="form-control summernote-simple" name="bio">{{ auth()->user()->bio }}</textarea>
                    </div>
                  </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('customCSS')
{{-- <link rel="stylesheet" href="{{ asset('assets/bootstrap-social/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('assets/summernote/dist/summernote-bs4.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
@endpush

@push('customJS')
{{-- <script src="{{ asset('assets/summernote/dist/summernote-bs4.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
@endpush
