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
            background-image: url('../assets/img/bg_login.png');
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            background-size: cover;
        }
        .login-wrapper::before {
            content: '';
            background-image: url('../assets/img/login_purple_layer.png');
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
                <img src="{{('/assets/img/logo_white.png')}}" alt="Logo">
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
                @if(Session::has('flash_message_error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                        {{ Session::get('flash_message_error') }}
                    </p>
                @endif
                @if(Session::has('flash_message_success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                         {{ Session::get('flash_message_success') }}
                    </p>
                @endif
                <p class="mb-2">
                    We have sent a PIN to your number. Paste the number to the input field below
                </p>
                <form action="{{ url('/otpVerify') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control mb-2 login-box-shadow" placeholder="Enter PIN Code" id="otp" name="otp">
                    <div id="errorMsgOtp" style="color: red;"></div>

                    @php
                        $get_user = session()->get('get_user');
                    @endphp
                    <input type="hidden" id="hidden_msisdn" value="{{$get_user}}" name="msisdn">

                    <button class="btn btn-block bg-green text-white login-box-shadow mb-2" style="font-weight: bold;">Send</button>
                    <button type="button" class="btn btn-block bg-white text-white login-box-shadow mb-2" style="font-weight: bold; color: #7CD327; border: 1px solid #7CD327">Cancel</button>

                    <!-- <p class="text-center mb-0">Didn't get PIN? <a href="{{route('register')}}">Retry</a></p> -->

                    @if(Session::has('flash_message_success'))
                        <p class="text-center mb-0">Did you want to Sign-In? <a href="{{ url('/login') }}">Login</a></p>
                    @else
                        <p class="text-center mb-0">Didn't get PIN? <a href="{{ url('/register') }}">Retry</a></p>
                    @endif

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>