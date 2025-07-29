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
               <a id="logo" href="{{route('home')}}"> <img src="{{('assets/img/logo_white.png')}}" alt="Logo"/></a>
            </div>
            <div class="login-card">
                <div style="margin-bottom: 24px;">
                    <h3 id="loginTitle" class="mt-0" style="font-weight: bold;">{{ trans('lang.Sign In') }}</h3>
                    <p id="loginTxt" class="mb-0" style="opacity: 0.8;">{{ trans('lang.Sign in to continue') }}</p>
                </div>

                @if(Session::has('flash_message_error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                        {{ trans('lang.'.Session::get('flash_message_error')) }}
                </p>
                @endif


                <form action="{{ url('/userSubmit') }}" method="post">
                	@csrf
                    <input id="phoneNumberInput" type="text" class="form-control mb-2 login-box-shadow" name="login" placeholder="Phone Number">
                    <input type="hidden" name="usertoken" id="usertoken">
                    <button id="loginBtn" class="btn btn-block bg-green btn-success login-box-shadow mb-2" style="font-weight: bold;">{{ trans('lang.Sign In') }}</button>
                    <!-- <p class="text-center mb-0">Don't have an account? <a href="{{route('register')}}">Create one</a></p> -->
                </form>
            </div>
        </div>
    </div>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
    
    <script>
    $( document ).ready(function() {
    var base_url = window.location.origin;
    
    var firebaseConfig = {
        apiKey: "AIzaSyAomKICBn4ylLWe662hZf6b93BFVES79MI",
        authDomain: "lravelpushnotif.firebaseapp.com",
        projectId: "lravelpushnotif",
        storageBucket: "lravelpushnotif.appspot.com",
        messagingSenderId: "153977875047",
        appId: "1:153977875047:web:795aeef5d2f5cfca9242c2"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();


    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
            
        }).then(function(token) {
            console.log(token);
            
            document.getElementById('usertoken').value = token;
        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();
  
    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });
    });


if ('serviceWorker' in navigator) {
    
  navigator.serviceWorker.register('/firebase-messaging-sw.js')
    .then(function(registration) {
      console.log('✅ Service Worker registered with scope:', registration.scope);
    }).catch(function(err) {
      console.error('❌ Service Worker registration failed:', err);
    });
}

    
</script>
</body>
</html>