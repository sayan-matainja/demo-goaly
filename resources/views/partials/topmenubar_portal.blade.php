<div id="toolbar" class="navbar-custom">


    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo-white.png') }}" alt="Goaly Logo" width="338" height="205" style="height:64px; width:auto; padding:10px; padding-left:16px" alt="Goaly Logo"></a>
    </div>
    <div class="m-0">
        &nbsp;
    </div>
    <div class="open-right">
        <a id="searchIcn" href="{{route('search')}}" class="ion-head">
            <ion-icon name="search" role="img" class="hydrated" aria-label="search"></ion-icon>
        </a>
        <!-- <a href="{{route('search')}}" class="ion-head">
            <ion-icon name="search" role="img" class="hydrated" aria-label="search"></ion-icon>
        </a> -->

        @php
            $UserData = Session::get('UserId');
        @endphp
        @if ($UserData)
            <a id="profileIcn" href="{{route('profile')}}" class="ion-head">
                <ion-icon name="person" role="img" class="hydrated" aria-label="person"></ion-icon>
            </a>
        @endif
        <button type="button" id="sideBar" class="button-collapse navbar-toggle nav-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar white"></span>
            <span class="icon-bar white spec"></span>
            <span class="icon-bar white"></span>
        </button>
    </div>
  </div>

        <div id="loader-logo-golay" class="loader-logo-golay" style=" zIndex: 998;">

            <img  src="{{asset('assets/img/logo-goaly.png')}}"  style="height: auto; width: 50%" alt="goaly logo" />
        </div>
