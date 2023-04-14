@extends('layouts.backend')

@section('title')
    Login
@endsection

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Admin</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                @include('layouts.message')

                <form action="{{ route('access') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="email" required name="email" value="{{ old('email') }}"
                            class="form-control form-control @error('email') is-invalid @enderror" placeholder="Email" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger font-italic">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mt-3">
                        <input type="password" required name="password"
                            class="form-control form-control @error('password') is-invalid @enderror"
                            placeholder="Password" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger font-italic">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label for="remember"> Remember Me </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                Sign In
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="my-4">
                    <a href="{{ route('forgot') }}">I forgot my password?</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
