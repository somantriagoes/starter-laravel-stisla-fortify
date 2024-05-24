@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Lecturers</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
        <div class="breadcrumb-item"><a href="#">Lecturers</a></div>
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
              <h4>List Lecturers</h4>
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
                    <th>Phone</th>
                    <th>Status</th>
                  </tr>
                  @forelse ($lecturers as $key => $lecturer)
                      <tr>
                        <td>{{ $lecturers->firstItem() + $key }}</td>
                        <td>{{$lecturer->name}}</td>
                        <td>{{$lecturer->email}}</td>
                        <td style="text-align:center;">{{$lecturer->phone}}</td>
                        <td style="text-align:center;">
                            @if ($lecturer->email_verified_at != null)
                                <div class="badge badge-success">Verified</div>
                            @else
                            <div class="badge badge-warning">Pending</div>
                            @endif
                            @if ($lecturer->active == 1)
                                <div class="badge badge-success">Active</div>
                            @else
                            <div class="badge badge-danger">Non Active</div>
                            @endif
                        </td>
                      </tr>
                  @empty
                  <tr>
                    <td colspan="5">
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
                    {{ $lecturers->withQueryString()->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
