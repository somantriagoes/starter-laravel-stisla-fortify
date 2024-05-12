@extends('layouts.custom')

@section('title', 'Email Verification')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    {{-- <h4>Please check your Email for verification!</h4> --}}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('verification.send') }}" class="needs-validation" novalidate="">
                        @csrf
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                A new email verification link has been emailed to you!
                            </div>
                        @else
                            <div class="mb-4 font-medium text-sm text-green-600">
                                Please check the email to verify your account!
                            </div>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Resend Email Verification!
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="simple-footer">
                @include('layouts.simple-footer')
            </div>
        </div>
    </div>
    </div>
@endsection
