<style>


   
</style>
<div id="toolbar" class="navbar-custom">

    <div class="logo">
        <a href="{{route('home')}}"><img src="{{('/assets/img/logo-white.png')}}" height="64" alt=""> </a>
    </div>
    <div class="m-0">
        &nbsp;
    </div>
    <div class="open-right">
        <a href="#" class="ion-head">
            <ion-icon name="search" role="img" class="hydrated" aria-label="search"></ion-icon>
        </a>
        <!-- <a href="{{route('search')}}" class="ion-head">
            <ion-icon name="search" role="img" class="hydrated" aria-label="search"></ion-icon>
        </a> -->

        @php
            $UserData = Session::get('UserId');
        @endphp
        @if ($UserData)
            <a href="{{route('profile')}}" class="ion-head">
                <ion-icon name="person" role="img" class="hydrated" aria-label="person"></ion-icon>
            </a>
        @endif
        <button type="button" class="button-collapse navbar-toggle nav-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar white"></span>
            <span class="icon-bar white spec"></span>
            <span class="icon-bar white"></span>
        </button>
    </div>
  </div>
