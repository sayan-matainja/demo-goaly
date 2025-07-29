@extends('layouts.frontend_layout.frontend_design')

@section('content')
<div class="loading align-items-center justify-content-center">
    <img src="images/loading.gif" alt="Loading">
</div>
<div class="header-title">
    <div class="container d-flex align-items-center">
        <a href="{{ url()->previous() }}" class="header-title-back">
            <img class="img-fluid" src="{{ asset('images/ico_prev_white.png')}}" alt="Prev">
        </a>
        Rules and Policies
    </div>
</div>

<div class="content-wrapper">
    <div class="container">
        <div class="additional-content-box">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem</p>
        </div>
    </div>
</div>
@endsection