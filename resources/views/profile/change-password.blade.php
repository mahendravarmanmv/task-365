@extends('layouts.app-home')

@section('content')
<div class="container py-2 pb-5"> {{-- Added pb-5 for bottom space --}}
    <h4 class="mb-4 text-center">Change Password</h4>

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form id="changepassword" method="POST" action="{{ route('change.password.update') }}">
                @csrf

                {{-- Old Password --}}
                <div class="mb-3 position-relative">
                    <label for="old_password" class="form-label">Old Password</label>
                    <div class="input-group">
                        <input type="password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="old_password">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    @error('old_password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- New Password --}}
                <div class="mb-3 position-relative">
                    <label for="new_password" class="form-label">New Password</label>
                    <div class="input-group">
                        <input type="password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="new_password">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    @error('new_password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirm New Password --}}
                <div class="mb-3 position-relative">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <div class="input-group">
                        <input type="password" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation">
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="new_password_confirmation">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    @error('new_password_confirmation')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="theme-btn py-2">Update Password</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('jquery_scripts')
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/validations/change-password.js?v=0.1') }}"></script>
@endsection