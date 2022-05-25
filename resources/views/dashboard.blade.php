@extends('layouts.app')

@section('content')

<style>
  .single_advisor_profile {
    position: relative;
    margin-bottom: 50px;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    z-index: 1;
    border-radius: 15px;
    -webkit-box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
    box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
  }

  .single_advisor_profile .advisor_thumb {
    position: relative;
    z-index: 1;
    border-radius: 15px 15px 0 0;
    margin: 0 auto;
    padding: 30px 30px 0 30px;
    background-color: #3f43fd;
    overflow: hidden;
  }

  .single_advisor_profile .advisor_thumb::after {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    position: absolute;
    width: 150%;
    height: 80px;
    bottom: -45px;
    left: -25%;
    content: "";
    background-color: #ffffff;
    -webkit-transform: rotate(-15deg);
    transform: rotate(-15deg);
  }

  @media only screen and (max-width: 575px) {
    .single_advisor_profile .advisor_thumb::after {
      height: 160px;
      bottom: -90px;
    }
  }

  .single_advisor_profile .advisor_thumb .social-info {
    position: absolute;
    z-index: 1;
    width: 100%;
    bottom: 0;
    right: 30px;
    text-align: right;
  }

  .single_advisor_profile .advisor_thumb .social-info a {
    font-size: 14px;
    color: #020710;
    padding: 0 5px;
  }

  .single_advisor_profile .advisor_thumb .social-info a:hover,
  .single_advisor_profile .advisor_thumb .social-info a:focus {
    color: #3f43fd;
  }

  .single_advisor_profile .advisor_thumb .social-info a:last-child {
    padding-right: 0;
  }

  .single_advisor_profile .single_advisor_details_info {
    position: relative;
    z-index: 1;
    padding: 30px;
    text-align: right;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    border-radius: 0 0 15px 15px;
    background-color: #ffffff;
  }

  .single_advisor_profile .single_advisor_details_info::after {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    position: absolute;
    z-index: 1;
    width: 50px;
    height: 3px;
    background-color: #3f43fd;
    content: "";
    top: 12px;
    right: 30px;
  }

  .single_advisor_profile .single_advisor_details_info h6 {
    margin-bottom: 0.25rem;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
  }

  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .single_advisor_profile .single_advisor_details_info h6 {
      font-size: 14px;
    }
  }

  .single_advisor_profile .single_advisor_details_info p {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    margin-bottom: 0;
    font-size: 14px;
  }

  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .single_advisor_profile .single_advisor_details_info p {
      font-size: 12px;
    }
  }

  .single_advisor_profile:hover .advisor_thumb::after,
  .single_advisor_profile:focus .advisor_thumb::after {
    background-color: #070a57;
  }

  .single_advisor_profile:hover .advisor_thumb .social-info a,
  .single_advisor_profile:focus .advisor_thumb .social-info a {
    color: #ffffff;
  }

  .single_advisor_profile:hover .advisor_thumb .social-info a:hover,
  .single_advisor_profile:hover .advisor_thumb .social-info a:focus,
  .single_advisor_profile:focus .advisor_thumb .social-info a:hover,
  .single_advisor_profile:focus .advisor_thumb .social-info a:focus {
    color: #ffffff;
  }

  .single_advisor_profile:hover .single_advisor_details_info,
  .single_advisor_profile:focus .single_advisor_details_info {
    background-color: #070a57;
  }

  .single_advisor_profile:hover .single_advisor_details_info::after,
  .single_advisor_profile:focus .single_advisor_details_info::after {
    background-color: #ffffff;
  }

  .single_advisor_profile:hover .single_advisor_details_info h6,
  .single_advisor_profile:focus .single_advisor_details_info h6 {
    color: #ffffff;
  }

  .single_advisor_profile:hover .single_advisor_details_info p,
  .single_advisor_profile:focus .single_advisor_details_info p {
    color: #ffffff;
  }
</style>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{$data->first_name}} {{$data->last_name}}</h5>
            <p class="text-muted mb-1">{{$data->email}}</p>
            <div class="d-flex justify-content-center mb-2">
              <a href="{{ route('logout') }}"><button type="button" class="btn btn-primary">Log Out</button></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->first_name}} {{$data->last_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->dob}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->gender}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Annual Income</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->annual_income}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Occupation</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->occupation}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Family Type</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->family_type}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Manglik</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->manglik}}</p>
              </div>
            </div>
          </div>

        </div>


      </div>
    </div>


  </div>

  <!-- Profile -->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-lg-8 col-lg-3">
        <!-- Section Heading-->
        <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
          <h3 style="color:goldenrod;">Suggestions<span> Based on Your Preferences</span></h3>
          <p>
          <ul class="list-group list-group-horizontal justify-content-center">
            @foreach ( $multi_occupation as $data )
            <li class="list-group-item">{{$data}}</li>
            @endforeach
          </ul>
          <ul class="list-group list-group-horizontal justify-content-center">
            @foreach ( $multi_family_type as $family )
            <li class="list-group-item">{{$family}}</li>
            @endforeach
            @foreach ( $multi_manglik as $manglik )
            <li class="list-group-item">@if ($manglik == 'yes') Manglik @else non-Manglik @endif</li>
            @endforeach
          </ul>

          </p>
          <hr>
          <br>
          <div class="line"></div>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach ( $suggestion as $data)


      <!-- Single Advisor-->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
          <!-- Team Thumb-->
          <div class="advisor_thumb">
            @if ($data->gender == 'male')
            <img src="{{asset('images/male.png')}}" alt="">
            @else
            <img src="{{asset('images/female.png')}}" alt="">
            @endif

            <!-- Social Info-->
            <div class="social-info"><a href="#" style="text-decoration: none;">
                <h6>{{\Carbon\Carbon::parse($data->dob)->age;}}
              </a></h6>
            </div>
          </div>
          <!-- Team Details-->
          <div class="single_advisor_details_info">

            <h6>{{ $data->first_name }} {{ $data->last_name }}</h6>
            <p class="designation">DOB : {{ $data->dob }}</p>
            <h6>Email : {{ $data->email }}</h6>
            <h6>Gnder : {{ $data->gender }}</h6>
            <h6>Income : {{ $data->annual_income }}</h6>
            <h6>Occupation : {{ $data->occupation }}</h6>
            <h6>Family : {{ $data->family_type }}</h6>
            <h6>Manglik : <span>{{ $data->manglik }}</span></h6>
          </div>
        </div>
      </div>

      @endforeach

    </div>
  </div>
</section>
@endsection