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
        <div class="registration form">
        <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="{{ route('properties.index') }}" class="text-white h2 mb-0"><strong>Apart<span class="text-primary">.</span></strong></a></h1>
            </div>
            <header>Signup</header>
            <form action="{{ route('sign_up')}}" method="post">
                @csrf <input type="text" placeholder="Enter your name" name="name">
                <input type="text" placeholder="Enter your email" name="email">
                <input type="password" placeholder="Create a password" name="password">
                <input type="password" placeholder="Confirm your password" name="confirmed_password">
                <input type="hidden" name="role_id" value="3">
                <input type="checkbox" id="vehicle1" name="role_id" value="2">
                <label for="vehicle1"> Are you a lessor</label>
                <input type="submit" class="button" value="Signup">
            </form>
            <div class="signup">
                <span class="signup">Already have an account?
                    <label for="check"><a href="{{ route('login1') }}">Login</a></label>
                </span>
            </div>
        </div>
    </div>
</body>

</html>
