@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Courses</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Manage Courses</a></div>
          <div class="breadcrumb-item"><a href="#">Courses</a></div>
          <div class="breadcrumb-item">Table</div>
        </div>
      </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                @include('layouts.alert')
            </div>
        </div>
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12">
            <div class="card">
              <form method="POST" action="#" class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                  <h4>Upload Course File</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-8 col-12">
                        <label>Course Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $product_courses->name }}">
                      </div>
                      <div class="form-group col-md-4 col-12">
                        <label>Course Level</label>
                        <input type="text" class="form-control" name="course_level" id="course_level" value="{{ $product_courses->course_level !='' ? $product_courses->course_level : "-" }}">
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label>Category</label>
                            <input type="text" class="form-control" name="category" id="category" value="{{ $product_courses->categories->name }}">
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Language</label>
                            <input type="text" class="form-control" name="language" id="language" value="{{ $product_courses->language }}">
                        </div>
                        <div class="form-group col-md-4 col-12"">
                            <label>Lecturer</label>
                            <input type="text" class="form-control" name="lecturer" id="lecturer" value="{{ $product_courses->lecturers->user->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label>Course Series Type</label>
                            <input type="text" class="form-control" name="series" id="series" value="{{ $product_courses->series == "Y" ? "Yes" : "No" }}">
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Total Duration (<span style="color:#ff0000;">in minutes</span>)</label>
                            <input type="number" class="form-control" name="duration" id="duration" value="{{ $product_courses->duration }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12 pb-1" style="background-color: #ffe02f">
                            <label>COURSE FILE</label>
                            <input class="form-control @error('course_file')
                            is-invalid
                            @enderror" type="file" name="course_file" id="course_file">
                            @error('course_file')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <div class="text-center">
                                <input type="hidden" name="id" id="id" value="{{ $product_courses->id }}">
                                <button class="btn btn-warning">Back to Edit</button>
                                <button class="btn btn-success" type="submit">Click to Upload Course</button>
                              </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection

@push('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush

@push('customJS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="{{ asset('assets/js/alert.delay.js') }}"></script>
@endpush
