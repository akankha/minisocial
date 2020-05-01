@extends('layouts.auth')

@section('content')
    <div class="col-lg-5 col-md-7 bg-white">
        <div class="p-3">
            <div class="text-center">
            <img src="../assets/images/big/icon.png" alt="wrapkit">
            </div>
            <h2 class="mt-3 text-center">Sign Up for Free</h2>
            <form class="mt-4" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder="your name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="email address">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password" placeholder="password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Confirm password">


                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark">
                            {{ __('Sign Up') }}
                        </button>
                    </div>
                    <div class="col-lg-12 text-center mt-5">
                        Already have an account? <a href="{{ route('login') }}" class="text-danger">Sign In</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
