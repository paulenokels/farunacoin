@extends('layouts.dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<style>
    .form-row {
        margin-top: 15px;
    }
    .profile-header {
        background: rgb(34,87,195);
background: linear-gradient(0deg, rgba(34,87,195,1) 0%, rgba(45,253,113,0.9206057422969187) 100%);
    }
    
</style>

<!-- profile picture and name -->
<div class="row  ">
    <div class="col-12 ">
        <div class="card profile-header">
            <div class="card-body mx-auto ">
                <p><img src="{{ asset(Auth::user()->dp) }}" class=" thumb"  /></p>
                <b style="color: white">{{ Auth::user()->full_name }}</b>
            </div>
        </div>
    </div>
</div>


<!-- edit form -->
<div class="row section-content">
    <div class="col-12">
        <div class="card">
            <div class="card-body ">
            @if(count($errors))
                             <div class="row">
                                    <div class="col-6 col-sm-12 mx-auto">

                                        <div class="error" style="text-align:center; margin-bottom: 10px">
                                            <ul class="list-group error">
                                                @foreach($errors->all() as $error)
                                                    <li class="list-group-item error">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
            <form enctype="multipart/form-data" method="POST" action="{{ url('dash/user/profile/update') }}">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <label>First Name <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="First name" value="{{ Auth::user()->first_name }}" name="first_name" required>
                    </div>
                    <div class="col">
                        <label>Last Name <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Last name" value="{{ Auth::user()->last_name }}" name="last_name" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" placeholder="First name" value="{{ Auth::user()->phone_number }}" name="phone_number" required>
                    </div>
                    <div class="col">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Last name" value="{{ Auth::user()->email }}" name="email" required>
                    </div>
                </div>
              
                <div class="form-row">
                    <div class="col">
                        <label for="exampleFormControlFile1">Profile Picture</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="profile_picture" >
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                        <input type="submit" value="Update Details" class="form-control btn btn-success" >
                    </div>
                </div>
            </form>

        <hr>
           
        </div>
    </div>
</div>
</div>
@endsection
