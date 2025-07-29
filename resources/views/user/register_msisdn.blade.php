<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/util.css') }}">
    
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/frontend/custom.js')}}"></script>

    <!-- sweetalert cdn [11.03.2021] -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- sweetalert cdn [11.03.2021] -->

    <title>Login</title>

    <style>
        .login-wrapper {
            background-image: url('assets/img/bg_login.png');
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            background-size: cover;
        }
        .login-wrapper::before {
            content: '';
            background-image: url('assets/img/login_purple_layer.png');
            background-repeat: no-repeat;
            background-position: top left;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 1;
        }
        .login-logo {
            position: relative;
            z-index: 9;
        }
        .login-card {
            background-color: #FFFFFF;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            border-radius: 5px;
            padding: 24px 18px;
            position: relative;
            z-index: 9;
        }
        a {
            color: #7CD327;
        }
        .login-box-shadow {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.18)
        }
    </style>


</head>
<body>

    <div class="login-wrapper">
        <div class="container">
            <div class="login-logo text-center" style="margin-top: 40px; margin-bottom: 30px;">
                <img src="{{('assets/img/logo_white.png')}}" alt="Logo">
            </div>
            <div class="login-card">
                <div style="margin-bottom: 24px;">
                    <h3 class="mt-0" style="font-weight: bold;">Sign Up</h3>
                    <p class="mb-0" style="opacity: 0.8;">Create a new account</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/otpgenerate') }}" method="post">
                    @csrf
                    <input type="text" class="form-control mb-2 login-box-shadow" name="msisdn" id="msisdn" placeholder="Enter Phone Number">
                    <div id="errorMsg" style="color: red;"></div>
                    <div class="checkbox" style="margin-bottom: 2rem;">
                        <label><input type="checkbox" id="checkboxID" value="">I agree to the terms and conditions</label>
                        <div id="checkboxErr" style="color: red;"></div>
                      </div>
                    <button class="btn btn-block bg-green btn-success login-box-shadow mb-2" style="font-weight: bold;">Continue</button>
                    <p class="text-center mb-0">Already have an account? <a href="{{ url('/login') }}">Sign in</a></p>
                </form>
            </div>
        </div>
    </div>

    
    
</body>
</html>