@extends('layouts.app')

@section('title', 'Course List')

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
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4><a href="{{ route('product-courses.create') }}" class="btn btn-success"><i class="fas fa-edit"></i>Create Data</a></h4>
              <div class="card-header-form">
                <form method="GET">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr style="text-align:center;">
                    <th>No</th>
                    <th>Course Name</th>
                    <th>Category</th>
                    <th>Lecturer</th>
                    <th>Discount</th>
                    <th>Price</th>
                    <th>Sales Price</th>
                    <th>Action</th>
                  </tr>
                  @forelse ($product_courses as $key => $product_course)
                      <tr>
                        <td style="text-align:center;">{{ $product_courses->firstItem() + $key }}</td>
                        <td>{{$product_course->name}}</td>
                        <td>{{$product_course->categories->name}}</td>
                        <td>{{$product_course->lecturers->user->name}}</td>
                        <td style="text-align:center;">
                            @if ($product_course->discount_id != '1')
                                @if($product_course->discounts->type == 'rupiah')
                                    {{ number_format($product_course->discounts->discount) }}
                                @else
                                    {{ $product_course->discounts->discount.' %' }}
                                @endif
                            @else
                                {{ '0' }}
                            @endif
                        <td style="text-align: right;">{{ number_format($product_course->price) }}</td>
                        <td style="text-align: right;">
                            @if ($product_course->discount_id != '1')
                                @if($product_course->discounts->type == 'rupiah')
                                    {{ number_format($product_course->price - $product_course->discounts->discount) }}
                                @else
                                    {{ number_format($product_course->price - ($product_course->price * $product_course->discounts->discount/100)) }}
                                @endif
                            @else
                                {{ number_format($product_course->price) }}
                            @endif
                        </td>
                        <td style="text-align:center;">
                            <a href="#" class="btn btn-info"><i class="fas fa-info-circle"></i></a>&nbsp;
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>&nbsp;
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                  @empty
                  <tr>
                    <td colspan="7">
                        No Data Found
                    </td>
                  </tr>
                  @endforelse
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    {{ $product_courses->withQueryString()->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('customJS')
<script src="{{ asset('assets/js/alert.delay.js') }}"></script>
<script src="{{ asset('assets/js/app/product_courses.js') }}"></script>
@endpush
