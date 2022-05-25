@extends('layouts.app')
@section('content')
    
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="{{ asset('images/draw2.png')}}" class="img-fluid" alt="Phone image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form action="{{ route('login-check') }}" method="post">
                        @if (Session::has('fail'))
                                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ old('email') }}" />
                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                 <span class="text-danger">@error('password') {{$message}} @enderror</span>
                            </div>
                            
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                            </div>

                            <a class="btn btn-primary btn-lg btn-block" style="background-color: #dd4b39" href="{{ url('/google') }}" role="button">
                                <i class="fab fa-facebook-f me-2"></i>Continue with Google
                            </a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
    @endsection
