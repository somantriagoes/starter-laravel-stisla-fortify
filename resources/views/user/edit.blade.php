@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Users</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Manage Account</a></div>
        <div class="breadcrumb-item"><a href="#">Users</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>

    <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12">
            <div class="card">
              <form method="POST" action="{{route('user.update', $user->id)}}" class="needs-validation">
                @method('PUT')
                @csrf
                <div class="card-header">
                  <h4>Change Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name')
                            is-invalid
                        @enderror" name="name" value="{{ $user->name }}">
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
                        @enderror" name="email" value="{{ $user->email }}">
                        @error('email')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control @error('phone')
                                is-invalid
                            @enderror" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7 col-12"">
                            <label>Role</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="role" value="admin" class="selectgroup-input" {{$user->role == "admin" ? "checked" : ""}}>
                                    <span class="selectgroup-button">Admin</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="role" value="user" class="selectgroup-input" {{$user->role == "user" ? "checked" : ""}}>
                                    <span class="selectgroup-button">User</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="role" value="lecturer" class="selectgroup-input" {{$user->role == "lecturer" ? "checked" : ""}}>
                                    <span class="selectgroup-button">Lecturer</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7 col-12"">
                            <label>Active User</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="active" value="1" class="selectgroup-input" {{$user->active == 1 ? "checked" : ""}}>
                                    <span class="selectgroup-button">Active</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="active" value="0" class="selectgroup-input" {{$user->active == 0 ? "checked" : ""}}>
                                    <span class="selectgroup-button">Non Active</span>
                                </label>
                            </div>
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
                    <div class="row">
                        <div class="form-group col-md-7 col-12">
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
