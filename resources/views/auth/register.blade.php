@extends('layouts.master_non_login')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <input type="text" id="firstName" name="first_name"
                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                   value="{{ old('first_name') }}"
                                   placeholder="First name" required autofocus>
                            <label for="firstName" class="control-label sr-only">First name</label>

                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="lastName" name="last_name"
                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                   value="{{ old('last_name') }}"
                                   placeholder="Last name" required>
                            <label for="lastName" class="control-label sr-only">
                                Last name
                            </label>

                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

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
                                Confirm password</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('login') }}">Login Page</a>
                <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
            </div>
        </div>
    </div>
@endsection
