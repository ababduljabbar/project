@extends('frontEnd.master')
@section('title','Register')
@section('content')
 
<div class="register-box">

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
  
        <form action="{{ route('register') }}" method="POST">
            @csrf
          <div class="input-group mt-3">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
        
          </div>
          @error('name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="input-group mt-3">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
        
          </div>
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          
         
          <div class="input-group mt-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="input-group mt-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          
          </div>
          @error('password_confirmation')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="row">
            <div class="col-8 mt-3">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            @error('terms')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <!-- /.col -->
            <div class="col-4 mt-3">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div>
  
        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
 
 
@endsection