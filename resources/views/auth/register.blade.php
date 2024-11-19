<!doctype html>
<html lang="en">

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="loginassets/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <!--  <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login </h2>
                </div>-->
                <a href="{{route('home')}}">
                    <img src="loginassets/images/logo.png" alt="" width="120px" height="120px">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(loginassets/images/login1.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">REGISTER</h3>
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
                            <form method="POST" action="{{ route('register') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Username"
                                        required>
                                    <!--<div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please enter your name</div>-->
                                    @error('name')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control  @error('email') is-invalid @enderror" placeholder="email"
                                        required>
                                    <!--<div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please enter your email</div>-->
                                    @error('email')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control   @error('password') is-invalid @enderror"
                                        placeholder="Password" required>
                                    <!--<div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please enter your password</div>-->
                                    @error('Password')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password"> Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control    @error('password_confirmation') is-invalid @enderror"
                                        placeholder="password_confirmation" required>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Register</button>
                                </div>
                                <!--  <div class="form-group d-md-flex">
                                  <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="{{ route('password.request') }}">Forgot Password</a>
                                    </div>
                                </div>-->
                            </form>
                            <p class="text-center">Already Registered? <a href="{{ route('login') }}">Login</a></p>
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