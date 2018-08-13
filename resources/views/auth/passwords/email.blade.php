@extends('layouts.master_non_login')

@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <div class="text-center mb-4">
                <h4>Forgot your password?</h4>
                <p>Enter your email address and we will send you instructions on how to reset your password.</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="email" id="inputEmail" name="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           value="{{ old('email') }}"
                           placeholder="Enter email address" required autofocus>
                    <label for="inputEmail" class="control-label sr-only">
                        Enter email address
                    </label>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('register') }}">Register an Account</a>
                <a class="d-block small" href="{{ route('login') }}">Login Page</a>
            </div>
        </div>
    </div>
@endsection
