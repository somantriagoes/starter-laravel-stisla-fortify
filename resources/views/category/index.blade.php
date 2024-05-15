@extends('layouts.app')

@section('title', 'Master Category')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Category</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><a href="#" class="btn btn-success" onclick="create();"><i class="fas fa-edit"></i>Create Data</a></h4>
                            <div class="card-header-form">
                                <form method="GET">
                                  <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search" value="{{ $search }}">
                                    <div class="input-group-btn">
                                      <button class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                        <div id="showDataTable"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Category Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="page-form" class="p-2"></div>
            </div>
        </div>
    </div>
</div>

@push('customJS')
    <script src="{{ asset('assets/js/app/category.js') }}"></script>
@endpush
