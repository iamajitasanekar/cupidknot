@extends('layouts.app')
@section('content')
    <section class="h-100 h-custom gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <form method="post" action="{{ route('register') }}">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @csrf
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Basic Information Section</h3>
                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="first_name">First name</label>
                                                    <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" value="{{ old('first_name') }}"/>
                                                    <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="last_name">Last name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" value="{{ old('last_name') }}"/>
                                                    <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="text" id="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}"/>
                                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="text" id="password" name="password" class="form-control form-control-lg" value="{{ old('password') }}"/>
                                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="dob">DOB</label>
                                                    <input type="date" id="dob" name="dob" class="form-control form-control-lg" value="{{ old('dob') }}"/>
                                                    <span class="text-danger">@error('dob') {{$message}} @enderror</span>
                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">
                                                <label class="form-label" for="gender">Gender</label>
                                                <div class="form-outline">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                                                        <label class="form-check-label" for="gender">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                                                        <label class="form-check-label" for="gender">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <span class="text-danger">@error('gender') {{$message}} @enderror</span>
                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="annual_income">Annual Income</label>
                                                    <input type="annual_income" id="annual_income" name="annual_income" class="form-control form-control-lg" value="{{ old('annual_income') }}"/>
                                                    <span class="text-danger">@error('annual_income') {{$message}} @enderror</span>
                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="annual_income">Occupation</label>
                                                    <select class="form-control" name="occupation">
                                                        <option value="">Select Occupation</option>
                                                        <option value="private job">Private job</option>
                                                        <option value="government job">Government Job</option>
                                                        <option value="business">Business</option>
                                                    </select>
                                                    <span class="text-danger">@error('occupation') {{$message}} @enderror</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="annual_income">Family Type</label>
                                                    <select class="form-control" name="family_type">
                                                        <option value="">Select Family Type</option>
                                                        <option value="joint family">Joint family</option>
                                                        <option value="nuclear family">Nuclear family</option>                                                        <option value="2">Business</option>
                                                    </select>
                                                    <span class="text-danger">@error('family_type') {{$message}} @enderror</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">
                                                <label class="form-label" for="annual_income">Manglik</label>
                                                <div class="form-outline">

                                                    <select class="form-control" name="manglik">
                                                        <option value="">Select Occupation</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    <span class="text-danger">@error('manglik') {{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                                <div class="col-lg-6 bg-indigo text-white">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5">Partner Preference</h3>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="form3Examplea2">Expected Income</label>
                                                <input type="text" id="expected_income" name="expected_income" class="form-control form-control-lg" readonly style="border:0; color:#f6931f; font-weight:bold;" />
                                                <br>
                                                <div id="slider-range"></div>
                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="form3Examplea3">Occupation</label>
                                                <select class="form-control selectpicker" name="multi_occupation[]" multiple>
                                                    <option value="private job">Private job</option>
                                                    <option value="government job">Government Job</option>
                                                    <option value="business">Business</option>
                                                </select>
                                                <span class="text-warning">@error('multi_occupation') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="form3Examplea3">Family Type</label>
                                                <select class="form-control selectpicker" name="multi_family_type[]" multiple>
                                                    <option value="joint family">Joint family</option>
                                                    <option value="nuclear family"> Nuclear family</option>
                                                </select>
                                                <span class="text-warning">@error('multi_family_type') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="form3Examplea3">Manglik</label>
                                                <select class="form-control selectpicker" name="multi_manglik[]" multiple>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                    <option value="both">Both</option>
                                                </select>
                                                <span class="text-warning">@error('multi_manglik') {{$message}} @enderror</span>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Register</button>

                                    </div>
                                </div>
                            </div>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
