<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
    <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="{{ route('properties.index') }}" class="text-white h2 mb-0"><strong>Apart<span class="text-primary">.</span></strong></a></h1>
            </div>
      <header>Login</header>
      <form action="{{ route('login') }}" method="post">
        @csrf

        <!-- Display email validation error -->
        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="text" placeholder="Enter your email" name="email">

        <!-- Display password validation error -->
        @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="password" placeholder="Enter your password" name="password">
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
          <label for="check"> <a href="{{ route('register') }}">Signup</a></label>
        </span>
      </div>
    </div>
  </div>
</body>
