@extends('layouts.app')

@section('title', 'Edit Password')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Password</div>
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

            <form method="POST" action="{{route('user-password.update')}}" class="needs-validation" novalidate="">
              @method('PUT')
              @csrf
              <div class="card-header">
                <h4>Change Your Password</h4>
              </div>

              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-7 col-12">
                      <label>Current Password</label>
                      <input type="password" class="form-control @error('current_password')
                          is-invalid
                      @enderror" name="current_password">
                      @error('current_password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3 col-12">
                      <label>New Password</label>
                      <input type="password" class="form-control @error('password')
                      is-invalid
                      @enderror" name="password">
                      @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group col-md-4 col-12">
                      <label>Password Confirmation</label>
                      <input type="password" class="form-control @error('password_confirmation')
                      is-invalid
                      @enderror" name="password_confirmation">
                      @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                </div>
              </div>

              <div class="card-footer text-right col-md-7">
                <button class="btn btn-primary" type="submit">Change Password</button>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
