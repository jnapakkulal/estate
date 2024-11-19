<!doctype html>
<html lang="en">

<head>
    <title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="loginassets/css/style.css">

    <style>
        .login {
            background: url(loginassets/images/logo.png);
            width: 120px;
            height: 120px;
            display: block;
        }
    </style>

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <a href="{{route('home')}}">
                        <img src="loginassets/images/logo.png" alt="" width="120px" height="120px">
                    </a>
                    <!--<h2 class="heading-section">Login </h2>-->
                    <!-- <img href="{{route('home')}}" src="loginassets/images/logo.png" width="120px" height="120px"
                        class=""></img>-->
                    <!--<a href="{{route('home')}}" class="login"></a>-->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(loginassets/images/welcome.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">LOG IN</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <!-- <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>-->
                                    </p>
                                </div>
                            </div>
                            <!--  <x-auth-session-status class="mb-4" :status="session('status')" />-->
                            <form method="POST" action="{{ route('login') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email/Name/Phone</label>
                                    <input type="text" id="login" name="login"
                                        class="form-control @error('login') is-invalid @enderror"
                                        value="{{ old('login') }}" placeholder="Username" required>
                                    <!--<div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please enter your name/email/phone</div>-->
                                    @error('login')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                    <!--<x-input-error :messages="$errors->get('login')" class="mt-2" />-->
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control  @error('password') is-invalid @enderror"
                                        placeholder="Password" required>
                                    <!-- <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please enter your password.</div>-->
                                    @error('password')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                    <!-- <x-input-error :messages="$errors->get('password')" class="mt-2" />-->
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Log
                                        In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="{{ route('password.request') }}">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Not yet Registered? <a href="{{ route('register') }}">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('loginassets/js/jquery.min.js')}}"></script>
    <script src="{{asset('loginassets/js/popper.js')}}"></script>
    <script src="{{asset('loginassets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('loginassets/js/main.js')}}"></script>

    <script>
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', (event) => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>

</html>