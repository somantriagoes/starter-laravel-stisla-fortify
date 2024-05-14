@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Users</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Manage Account</a></div>
        <div class="breadcrumb-item"><a href="#">User</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Users Table</h2>

      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>List Users</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Access Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Agus Somantri</td>
                    <td style="text-align:center;">08575214</td>
                    <td>Somantriagus@gmail.com</td>
                    <td style="text-align:center;">superadmin</td>
                    <td style="text-align:center;"><div class="badge badge-success">Active</div></td>
                    <td style="text-align:center;">
                        <a href="#" class="btn btn-info"><i class="fas fa-info-circle"></i> Detail</a>&nbsp;
                        <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>&nbsp;
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
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
