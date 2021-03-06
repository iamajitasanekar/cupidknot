@extends('layouts.app')

@section('content')
    
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="{{route('admin.login-check')}}" method="post">
                @csrf
            <h3 class="mb-5">Admin Login</h3>

            <div class="form-outline mb-4">                
              <label class="form-label" for="typeEmailX-2">Email</label>
              <input type="email" name="email" id="email" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">                
              <label class="form-label" for="typePasswordX-2">Password</label>
              <input type="password" name="password" id="password" class="form-control form-control-lg" />
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection