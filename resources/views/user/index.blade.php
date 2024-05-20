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
      <div class="row">
        <div class="col-12">
            @include('layouts.alert')
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>List Users</h4>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Access Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @forelse ($users as $key => $user)
                      <tr>
                        <td>{{ $users->firstItem() + $key }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td style="text-align:center;">{{$user->role}}</td>
                        <td style="text-align:center;">
                            @if ($user->email_verified_at != null)
                                <div class="badge badge-success">Verified</div>
                            @else
                            <div class="badge badge-warning">Pending</div>
                            @endif
                            @if ($user->active == 1)
                                <div class="badge badge-success">User Active</div>
                            @else
                            <div class="badge badge-danger">User Non Active</div>
                            @endif
                        </td>
                        <td style="text-align:center;">
                            <a href="#" class="btn btn-info"><i class="fas fa-info-circle"></i></a>&nbsp;
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>&nbsp;
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                  @empty
                  <tr>
                    <td colspan="6">
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
                    {{ $users->withQueryString()->links() }}
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
@endpush
