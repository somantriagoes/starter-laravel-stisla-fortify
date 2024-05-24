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
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12">
            <div class="card">
              <form method="POST" action="{{ route('product-courses.update') }}" class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                  <h4>Edit Course Product</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-8 col-12">
                        <label>Course Name</label>
                        <input type="text" class="form-control @error('name')
                            is-invalid
                        @enderror" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group col-md-4 col-12">
                        <label>Course Level</label>
                        <select class="form-control @error('course_level') is-invalid @enderror select2" name="course_level" id="course_level">
                            <option value="">[ Optional ]</option>
                            <option value="Beginner" {{ old('course_level') == "Beginner" ? "selected" : "" }} >Beginner</option>
                            <option value="Elementary" {{ old('course_level') == "Elementary" ? "selected" : "" }} >Elementary</option>
                            <option value="Intermediate" {{ old('course_level') == "Intermediate" ? "selected" : "" }} >Intermediate</option>
                            <option value="Advanced" {{ old('course_level') == "Advanced" ? "selected" : "" }} >Advanced</option>
                            <option value="Proficiency" {{ old('course_level') == "Proficiency" ? "selected" : "" }} >Proficiency</option>
                        </select>
                        @error('course_level')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label>Category</label>
                            <select class="form-control @error('category') is-invalid @enderror select2" name="category" id="category">
                                <option value="">[ Please Select Category ]</option>
                                @foreach ($categories as $category_key => $category_data)
                                <option value="{{ $category_data->id }}" {{ old('category') == $category_data->id ? "selected" : "" }} >{{ $category_data->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Language</label>
                            <select class="form-control @error('language')
                            is-invalid @enderror select2" name="language" id="language">
                                <option value="Indonesian" {{ old('language') == "Indonesian" ? "selected" : "" }}>Indonesian</option>
                                <option value="English" {{ old('language') == "English" ? "selected" : "" }}>English</option>
                            </select>
                            @error('language')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-12"">
                            <label>Lecturer</label>
                            <select class="form-control @error('lecturer')
                            is-invalid @enderror select2" name="lecturer" id="lecturer">
                                <option value="">[ Please Select Lecturer ]</option>
                                @foreach ($lecturers as $lecturer_key => $lecturer_data)
                                <option value="{{ $lecturer_data->id }}" {{ old('lecturer') == $lecturer_data->id ? "selected" : "" }}>{{ $lecturer_data->user->name }}</option>
                                @endforeach
                            </select>
                            @error('lecturer')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label>Discount</label>
                            <select class="form-control @error('discount')
                            is-invalid @enderror select2" name="discount" id="discount">
                                <option value="1">[ Optional ]</option>
                                @foreach ($discounts as $discount_key => $discount_data)
                                    @if ($discount_data->discount > 0)
                                        @php
                                        $Sel =  (old('discount') == $discount_data->id) ? "selected" : "";
                                        @endphp
                                        @if($discount_data->type == 'rupiah')
                                            {{$type = 'rupiah'}}
                                        @else
                                            {{$type = '%'}}
                                        @endif

                                        <option value="{{ $discount_data->id }}" {{ $Sel }} discount_tag="{{ $discount_data->id.'-'.$discount_data->type.'-'.$discount_data->discount }}">{{ Str::upper($discount_data->name) }} - {{ $discount_data->discount }} {{ $type }} </option>
                                    @endif
                                @endforeach
                                <option value="1">KOSONGKAN TANPA DISKON</option>
                            </select>
                            @error('discount')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Price (before discount)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      Rp
                                    </div>
                                </div>
                                <input type="number" class="form-control @error('price')
                                    is-invalid
                                @enderror" name="price" id="price" value="{{ old('price') }}">
                                @error('price')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Sales Price</label>
                            <input type="text" class="form-control @error('sales_price')
                            is-invalid
                            @enderror" name="sales_price" id="sales_price" value="{{ old('sales_price') }}" readonly>
                            @error('sales_price')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label>Image Ads</label>
                            <input class="form-control @error('image_ads')
                            is-invalid
                            @enderror" type="file" name="image_ads" id="image_ads">
                            @error('image_ads')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Course Series Type</label>
                            <select class="form-control @error('series')
                            is-invalid @enderror select2" name="series" id="series">
                                <option value="">[ Series Type ]</option>
                                <option value="Y" {{ old('series') == "Y" ? "selected" : "" }}>Yes</option>
                                <option value="N" {{ old('series') == "N" ? "selected" : "" }}>No</option>
                            </select>
                            @error('series')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Total Duration (<span style="color:#ff0000;">in minutes</span>)</label>
                            <input type="number" class="form-control @error('duration')
                            is-invalid
                            @enderror" name="duration" id="duration" value="{{ old('duration') }}">
                            @error('duration')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <img id="image-preview" style="max-height: 200px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description')
                            is-invalid @enderror summernote-simple" name="description" id="description">{{ old('description') }}</textarea>
                            @error('description')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <div class="text-right">
                                <button class="btn btn-info" type="reset" onclick="javascript:history.back();">Cancel</button>
                                <button class="btn btn-warning" type="submit">Update Data</button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

<link rel="stylesheet" href="{{ asset('assets/node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/node_modules/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('assets/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

@endpush

@push('customJS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- JavaScript library for formatting input text -->
<script src="{{ asset('assets/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

<script src="{{ asset('assets/js/app/product_courses.js') }}"></script>
@endpush
