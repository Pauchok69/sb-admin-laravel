@extends('layouts.master_non_login')

@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <input type="email" id="inputEmail" name="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="Email address"
                           required>
                    <label for="inputEmail" class="control-label sr-only">
                        Email address
                    </label>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <input type="password" id="inputPassword" name="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="Password" required>
                            <label for="inputPassword" class="control-label sr-only">
                                Password
                            </label>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <input type="password" id="confirmPassword"
                                   name="password_confirmation" class="form-control"
                                   placeholder="Confirm password" required="required">
                            <label for="confirmPassword" class="control-label sr-only">
                                Confirm password
                            </label>

                            @if ($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('login') }}">Login Page</a>
                <a class="d-block small mt-3" href="{{ route('register') }}">Register an Account</a>
            </div>
        </div>
    </div>
@endsection
