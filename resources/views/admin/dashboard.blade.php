@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
    .ui-group{
        display: inline-block;
        margin-right: 20px;
    }
    .sliders { padding: 15px 0 30px 0; }
.filter-section .filter-label {
  display: block;
  font-weight: bold;
}
.bootstrap-slider .slider-selection { background: #2175b0; }
</style>
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3 col-lg-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">User List</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                    <button type="button" class="nav-link"><a href="{{ route('admin.logout') }}">Logout</a></button>
                </div>

                <div class="col-lg-9">
                    <div class="filters">

                        <div class="ui-group">
                            <select class="filter-select form-select" value-group="age">
                                <option value="">Select Age</option>
                                @for ($i=20;$i<=50;$i++)
                                    <option value=".{{$i}}">{{$i}}</option>
                                @endfor
                                
                               
                            </select>
                        </div>

                        <div class="ui-group">
                            <select class="filter-select form-select" value-group="gender">
                                <option value="">Select Gender</option>
                                <option value=".male">Male</option>
                                <option value=".female">Female</option>
                            </select>
                        </div>

                        <div class="ui-group">
                            <select class="filter-select form-select" value-group="family">
                                <option value="">Select Family type</option>
                                <option value=".joint-family">Joint Family</option>
                                <option value=".nuclear-family">Nuclear Family</option>
                            </select>
                        </div>

                        <div class="ui-group">
                            <select class="filter-select form-select" value-group="manglik">
                                <option value="">Select Manglik</option>
                                <option value=".yes">Manglik</option>
                                <option value=".no">non-Manglik</option>
                            </select>
                        </div>

                    </div>
                   
                    <br>

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row grid">
                                @foreach ( $userData as $user )

                                <div class="col-xl-6 mb-4 filter-data {{ \Carbon\Carbon::parse($user->dob)->age; }} {{$user->gender}} {{preg_replace('/\s/','-',$user->family_type)}} {{$user->manglik}}" data-salary="{{$user->annual_income}}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    @if ($user->gender == 'male')
                                                    <img src="{{asset('images/male.png')}}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                                    @else
                                                    <img src="{{asset('images/female.png')}}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                                    @endif

                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1">{{ $user->first_name }} {{$user->last_name}}</p>
                                                        <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($user->dob)->age; }}</p>
                                                        <p class="text-muted mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                                <span class="badge rounded-pill badge-success">Active</span>
                                            </div>
                                        </div>
                                        <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                                            <div class="col-md-5">
                                                <p class="m-0">DOB : {{$user->dob }} Gender : {{$user->gender}}</p>
                                                <p class="">Income : {{$user->annual_income}} Occupation : {{$user->occupation}}</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="">Family : {{$user->family_type}} Manglik : {{$user->manglik}}</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $adminData->name }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $adminData->email }}</p>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
</section>
@endsection
