@extends('layouts.auth')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background-image: url({{ asset('img/bg_10.jpg') }})"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
					<img  class="img-responsive" width="175" height="42" src="img/site_logo.png" alt="Faruna Coin" />

                <h1 class="h4 text-gray-900 mb-4"> Create an Account</h1>
                @if(count($errors))
                             <div class="row">
                                    <div class="col mx-auto">

                                        <div class="error-text" style="text-align:center; margin-bottom: 10px">
                                            <ul class="list-group error-text">
                                                @foreach($errors->all() as $error)
                                                    <li class="list-group-item error-text">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
              </div>
              <form class="user" method="POST" action="{{ route('register') }}" >
              @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                  <input type="number" name="phone_number" value="{{ old('phone_number') }}" class="form-control form-control-user" id="exampleInputEmail" placeholder="Phone Number" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password_confirmation"  class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                  </div>
                </div>
                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
              
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr> -->
              <div class="text-center">
                <a class="small" href="{{ url('password/reset') }}">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{ url('login') }}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
                $(document).ready(function() {
                   $('form.reg-form').on('submit', function() {
                       $('button.registerbtn').prop('disabled', true);
                   });

                });
                </script>
@endsection
