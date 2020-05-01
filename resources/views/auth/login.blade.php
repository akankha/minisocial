@extends('layouts.auth')

@section('content')
    <div class="col-lg-5 col-md-7 bg-white">
        <div class="p-3">
            <div class="text-center">
                <img src="{{ asset('assets/images/big/icon.png') }}" alt="wrapkit">
            </div>
            <h2 class="mt-3 text-center">Sign In</h2>
            <p class="text-center">Enter your email address and password to access admin panel.</p>
            <form class="mt-4" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="uname">Username</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="enter your username">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="pwd">Password</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="current-password"  placeholder="enter your password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                    </div>
                    <div class="col-lg-12 text-center mt-5">
                        Don't have an account? <a href="{{ route('register') }}" class="text-danger">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
