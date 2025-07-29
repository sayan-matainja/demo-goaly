@include('partials.headernew')
</head>


<body>
    <div class="wrapper">
        <!-- header image -->
        <img src="{{ asset('assets/img/header.png') }}"class="img-fluid" alt="">

        <!-- league-cover -->
        <div class="league-cover">
            <div class="inner-league-cover">
                <div class="logo"><img src="{{ asset('assets/img/ic-epl.png') }}" alt=""></div>
                <h4 class="name">England Premier League</h4>
                <span>Season 2019/20</span>
                <span>Round 37/38</span>
            </div>
        </div>

        <!-- league menu -->
        <ul class="club-menu bg-purple" id="team_details" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false" aria-expanded="false">Match</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Standings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">Rank</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false" aria-expanded="false">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="six" aria-selected="false" aria-expanded="false">Team</a>
            </li>
        <!-- <ul class="league-menu bg-purple">
            <li class="active"><a href="9.html">Info</a></li>
            <li><a href="10.html">Match</a></li>
            <li><a href="11.html">Standings</a></li>
            <li><a href="12.html">Rank</a></li> -->
            <!-- <li><a href="13.html">News</a></li> -->
            <!-- <li><a href="14.html">Team</a></li> -->
        </ul>

        <!-- tabs content -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active p-3 in" id="one" aria-labelledby="one-tab">
                <div class="tab-content">

                    <!-- league highlight -->
                    <div class="league-highlight block bg-grey">
                        <h5>Season 2019/2020</h5>
                        <ul>
                            <li>
                                <span>54</span>
                                <span>Matches Played</span>
                            </li>
                            <li>
                                <span>100</span>
                                <span>Goal</span>
                            </li>
                            <li>
                                <span>14</span>
                                <span>Yellow Card</span>
                            </li>
                            <li>
                                <span>90</span>
                                <span>Others</span>
                            </li>
                        </ul>
                    </div>

                    <!-- league top player -->
                    <div class="league-top-player">
                        <div class="tag bg-dark d-flex text-white">
                            <span class="mr-auto">Top Player</span>
                            <span>Season 2019/2020</span>
                        </div>
                        <div class="p-2 bg-white">
                            <ul>
                                <li>
                                    <a href="{{route('playerDetails',[607,261951])}}">
                                    <div class="cover-img"><img src="{{ asset('assets/img/face.png') }}" alt=""></div> </a>
                                    <h5 class="my-1">Plaer Name</h5>
                                    <span><strong>Top Scorer</strong></span>
                                    <span class="btn-pill">
                                    Score <br> 20
                                    </span>
                                </li>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/face2.png') }}" alt=""></div>
                                    <h5 class="my-1">Plaer Name</h5>
                                    <span><strong>Top Assist</strong></span>
                                    <span class="btn-pill">
                                    Score <br> <b>20</b>
                                    </span>
                                </li>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/face3.png') }}" alt=""></div>
                                    <h5 class="my-1">Plaer Name</h5>
                                    <span><strong>Top Assist</strong></span>
                                    <span class="btn-pill">
                                    Score <br> <b>20</b>
                                    </span>
                                </li>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/face.png') }}" alt=""></div>
                                    <h5 class="my-1">Plaer Name</h5>
                                    <span><strong>Top Assist</strong></span>
                                    <span class="btn-pill">
                                    Score <br> <b>20</b>
                                    </span>
                                </li>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/face.png') }}" alt=""></div>
                                    <h5 class="my-1">Plaer Name</h5>
                                    <span><strong>Top Assist</strong></span>
                                    <span class="btn-pill">
                                    Score <br> <b>20</b>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- league matches -->
                    <div class="tag bg-purple d-flex text-white">
                        <span class="mr-auto">Last Game</span>
                        <span class="bg-whitepurple">More</span>
                    </div>
                    <div class="container-matches">
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="mb-0">Chelsea</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                        <span>2</span>
                                        <span class="mx-2 border-right"></span>
                                        <span>1</span>
                                    </div>
                                    <span class="my-1">07/07/2020 03:00</span>
                                    <span class="btn-pill bg-red">Finished</span>
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="mb-0">Manchester</h5>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="mb-0">Chelsea</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                        <span>0</span>
                                        <span class="mx-2 border-right"></span>
                                        <span>1</span>
                                    </div>
                                    <span class="my-1">07/07/2020 03:00</span>
                                    <span class="btn-pill bg-red">Finished</span>
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="mb-0">Manchester</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tag bg-purple d-flex text-white">
                        <span class="mr-auto">Next Game</span>
                        <span class="bg-whitepurple">More</span>
                    </div>
                    <div class="container-matches">
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="mb-0">Chelsea</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                        <span>--</span>
                                        <span class="mx-2 border-right"></span>
                                        <span>--</span>
                                    </div>
                                    <span class="my-1">07/07/2020 03:00</span>
                                    <!-- <span class="btn-pill bg-red">Finished</span> -->
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="mb-0">Manchester</h5>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="mb-0">Chelsea</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                        <span>--</span>
                                        <span class="mx-2 border-right"></span>
                                        <span>--</span>
                                    </div>
                                    <span class="my-1">07/07/2020 03:00</span>
                                    <!-- <span class="btn-pill bg-red">Finished</span> -->
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="mb-0">Manchester</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade p-3" id="two" aria-labelledby="two-tab">
                <div class="tab-content">

                    <div class="block bg-grey">
                        <div class="dropdown">
                            <button class="btn btn-lg btn-white w-100 d-flex ais-center" type="button" data-toggle="dropdown">
                            <span class="text-grey">Game Week 38</span>
                            <span class="caret ml-auto"></span>
                            </button>
                            <ul class="dropdown-menu w-100">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- league matches -->
                    <div class="tag"><u><b>Tuesday, 21 Jul 2020</b></u></div>
                    <div class="container-matches">
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><<img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="mb-0">Chelsea</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="border radius-1 px-2 py-1">London stadium</div>
                                    <h3 class="my-1">20:35 hrs</h3>
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><<img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="mb-0">Manchester</h5>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><<img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="mb-0">Chelsea</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="border radius-1 px-2 py-1">London stadium</div>
                                    <h3 class="my-1">20:35 hrs</h3>
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><<img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="mb-0">Manchester</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tag"><u><b>Saturday, 18 Jul 2020</b></u></div>
                    <div class="container-matches">
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><<img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="mb-0">Chelsea</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="border radius-1 px-2 py-1">London stadium</div>
                                    <h3 class="my-1">20:35 hrs</h3>
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><<img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="mb-0">Manchester</h5>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><<img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="mb-0">Chelsea</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="border radius-1 px-2 py-1">London stadium</div>
                                    <h3 class="my-1">20:35 hrs</h3>
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><<img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="mb-0">Manchester</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade p-3" id="three" aria-labelledby="three-tab">
                <!-- tabs content -->
                <div class="tab-content">

                    <div class="block bg-grey">
                        <div class="dropdown">
                            <button class="btn btn-lg btn-white w-100 d-flex ais-center" type="button" data-toggle="dropdown">
                            <span class="text-grey">Game Week 38</span>
                            <span class="caret ml-auto"></span>
                            </button>
                            <ul class="dropdown-menu w-100">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="standings table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <td colspan="2">Team</td>
                                    <td>Pts</td>
                                    <td>P</td>
                                    <td>W</td>
                                    <td>D</td>
                                    <td>L</td>
                                    <td>F</td>
                                    <td>A</td>
                                    <td>GD</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bg-green text-white">1.</td>
                                    <td style="white-space: nowrap">
                                        <div class="desc">
                                            <<img src="{{ asset('assets/img/ic-chelsea.png') }}" alt="">
                                            <div class="team">
                                                <span>Chelsea</span>
                                                <ul>
                                                    <li class="bg-red">L</li>
                                                    <li class="bg-green">W</li>
                                                    <li class="bg-green">W</li>
                                                    <li class="bg-orange">D</li>
                                                    <li class="bg-red">L</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="smw"><strong>93</strong></td>
                                    <td class="smw">36 <br> <span class="px-1 radius-1 bg-grey">-1</span></td>
                                    <td class="smw">43</td>
                                    <td class="smw">3</td>
                                    <td class="smw">3</td>
                                    <td class="smw">77</td>
                                    <td class="smw">29</td>
                                    <td class="smw">+28</td>
                                </tr>

                                <tr>
                                    <td class="bg-green text-white">2.</td>
                                    <td style="white-space: nowrap">
                                        <div class="desc">
                                            <<img src="{{ asset('assets/img/ic-albion.png') }}" alt="">
                                            <div class="team">
                                                <span>Chelsea</span>
                                                <ul>
                                                    <li class="bg-red">L</li>
                                                    <li class="bg-green">W</li>
                                                    <li class="bg-green">W</li>
                                                    <li class="bg-green">D</li>
                                                    <li class="bg-green">L</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="smw"><strong>93</strong></td>
                                    <td class="smw">36 <br> <span class="px-1 radius-1 bg-grey">-1</span></td>
                                    <td class="smw">43</td>
                                    <td class="smw">3</td>
                                    <td class="smw">3</td>
                                    <td class="smw">77</td>
                                    <td class="smw">29</td>
                                    <td class="smw">+28</td>
                                </tr>

                                <tr>
                                    <td class="bg-blueocean text-white">3.</td>
                                    <td style="white-space: nowrap">
                                        <div class="desc">
                                            <<img src="{{ asset('assets/img/ic-albion.png') }}" alt="">
                                            <div class="team">
                                                <span>Chelsea</span>
                                                <ul>
                                                    <li class="bg-red">L</li>
                                                    <li class="bg-green">W</li>
                                                    <li class="bg-green">W</li>
                                                    <li class="bg-orange">D</li>
                                                    <li class="bg-red">L</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="smw"><strong>93</strong></td>
                                    <td class="smw">36 <br> -1</td>
                                    <td class="smw">43</td>
                                    <td class="smw">3</td>
                                    <td class="smw">3</td>
                                    <td class="smw">77</td>
                                    <td class="smw">29</td>
                                    <td class="smw">+28</td>
                                </tr>

                                <tr>
                                    <td class="bg-red text-white">4.</td>
                                    <td style="white-space: nowrap">
                                        <div class="desc">
                                            <<img src="{{ asset('assets/img/ic-chelsea.png') }}" alt="">
                                            <div class="team">
                                                <span>Chelsea</span>
                                                <ul>
                                                    <li class="bg-red">L</li>
                                                    <li class="bg-orange">W</li>
                                                    <li class="bg-orange">W</li>
                                                    <li class="bg-orange">D</li>
                                                    <li class="bg-red">L</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="smw"><strong>93</strong></td>
                                    <td class="smw">36 <br> -1</td>
                                    <td class="smw">43</td>
                                    <td class="smw">3</td>
                                    <td class="smw">3</td>
                                    <td class="smw">77</td>
                                    <td class="smw">29</td>
                                    <td class="smw">+28</td>
                                </tr>

                                <tr>
                                    <td class="bg-darkgrey text-white">5. <span class="caret caret-up"></span></td>
                                    <td style="white-space: nowrap">
                                        <div class="desc">
                                            <<img src="{{ asset('assets/img/ic-albion.png') }}" alt="">
                                            <div class="team">
                                                <span>Chelsea</span>
                                                <ul>
                                                    <li class="bg-red">L</li>
                                                    <li class="bg-red">W</li>
                                                    <li class="bg-red">W</li>
                                                    <li class="bg-red">D</li>
                                                    <li class="bg-red">L</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="smw"><strong>93</strong></td>
                                    <td class="smw">36 <br> -1</td>
                                    <td class="smw">43</td>
                                    <td class="smw">3</td>
                                    <td class="smw">3</td>
                                    <td class="smw">77</td>
                                    <td class="smw">29</td>
                                    <td class="smw">+28</td>
                                </tr>

                                <tr>
                                    <td class="bg-darkgrey text-white">6. <span class="caret"></span></td>
                                    <td style="white-space: nowrap">
                                        <div class="desc">
                                            <<img src="{{ asset('assets/img/ic-albion.png') }}" alt="">
                                            <div class="team">
                                                <span>Chelsea</span>
                                                <ul>
                                                    <li class="bg-red">L</li>
                                                    <li class="bg-orange">W</li>
                                                    <li class="bg-red">W</li>
                                                    <li class="bg-green">D</li>
                                                    <li class="bg-green">L</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="smw"><strong>93</strong></td>
                                    <td class="smw">36 <br> <span class="px-1 radius-1 bg-grey">-1</span></td>
                                    <td class="smw">43</td>
                                    <td class="smw">3</td>
                                    <td class="smw">3</td>
                                    <td class="smw">77</td>
                                    <td class="smw">29</td>
                                    <td class="smw">+28</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade p-3" id="four" aria-labelledby="four-tab">

                <!-- tabs content -->
                <div class="tab-content">

                    <div class="tag bg-dark d-flex text-white">
                        <span style="width: 8%;">No.</span>
                        <span>Goal Keepers</span>
                        <span class="ml-auto bg-grey">More</span>
                    </div>
                    <div class="league-player-rank block">
                        <ul>
                            <li>
                                <span>1.</span>
                                <div class="desc">
                                    <div class="cover-img"><img class="img-fluid" src="./assets/img/face.png') }}" alt=""></div>
                                    <div>
                                        <h5 class="m-0"><b>Player Name</b></h5>
                                        <span>Chelsea</span>
                                    </div>
                                </div>
                                <span>55</span>
                            </li>
                            <li>
                                <span>2.</span>
                                <div class="desc">
                                    <div class="cover-img"><img class="img-fluid" src="./assets/img/face.png') }}" alt=""></div>
                                    <div>
                                        <h5 class="m-0"><b>Player Name</b></h5>
                                        <span>Chelsea</span>
                                    </div>
                                </div>
                                <span>13</span>
                            </li>
                            <li>
                                <span>3.</span>
                                <div class="desc">
                                    <div class="cover-img"><img class="img-fluid" src="./assets/img/face.png') }}" alt=""></div>
                                    <div>
                                        <h5 class="m-0"><b>Player Name</b></h5>
                                        <span>Chelsea</span>
                                    </div>
                                </div>
                                <span>4</span>
                            </li>
                            <li>
                                <span>4.</span>
                                <div class="desc">
                                    <div class="cover-img"><img class="img-fluid" src="./assets/img/face.png') }}" alt=""></div>
                                    <div>
                                        <h5 class="m-0"><b>Player Name</b></h5>
                                        <span>Chelsea</span>
                                    </div>
                                </div>
                                <span>23</span>
                            </li>
                        </ul>
                    </div>
                    <div class="tag bg-dark d-flex text-white">
                        <span style="width: 8%;">No.</span>
                        <span>Defenders</span>
                        <span class="ml-auto bg-grey">More</span>
                    </div>
                    <div class="league-player-rank block">
                        <ul>
                            <li>
                                <span>1.</span>
                                <div class="desc">
                                    <div class="cover-img"><img class="img-fluid" src="./assets/img/face.png') }}" alt=""></div>
                                    <div>
                                        <h5 class="m-0"><b>Player Name</b></h5>
                                        <span>Chelsea</span>
                                    </div>
                                </div>
                                <span>55</span>
                            </li>
                            <li>
                                <span>2.</span>
                                <div class="desc">
                                    <div class="cover-img"><img class="img-fluid" src="./assets/img/face.png') }}" alt=""></div>
                                    <div>
                                        <h5 class="m-0"><b>Player Name</b></h5>
                                        <span>Chelsea</span>
                                    </div>
                                </div>
                                <span>13</span>
                            </li>
                            <li>
                                <span>3.</span>
                                <div class="desc">
                                    <div class="cover-img"><img class="img-fluid" src="./assets/img/face.png') }}" alt=""></div>
                                    <div>
                                        <h5 class="m-0"><b>Player Name</b></h5>
                                        <span>Chelsea</span>
                                    </div>
                                </div>
                                <span>4</span>
                            </li>
                            <li>
                                <span>4.</span>
                                <div class="desc">
                                    <div class="cover-img"><img class="img-fluid" src="./assets/img/face.png') }}" alt=""></div>
                                    <div>
                                        <h5 class="m-0"><b>Player Name</b></h5>
                                        <span>Chelsea</span>
                                    </div>
                                </div>
                                <span>23</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade p-3" id="five" aria-labelledby="five-tab">

                <!-- tabs content -->
                <div class="tab-content">

                    <!-- news -->
                    <div class="main-news">
                        <div id="main-news-slider" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators mb-0">
                            <li data-target="#main-news-slider" data-slide-to="0" class="active"></li>
                            <li data-target="#main-news-slider" data-slide-to="1"></li>
                            <li data-target="#main-news-slider" data-slide-to="2"></li>
                            </ol>

                            <!-- rrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <<img src="{{ asset('assets/img/news/e.png') }}" alt="">
                                <div class="carousel-caption">
                                <h3>STANDOUT STATISTICS FROM FANTASY PREMIER LEAGUE GW25</h3>
                                <p>EXPECTED GOALS05 FEB 2020</p>
                                </div>
                            </div>

                            <div class="item">
                                <<img src="{{ asset('assets/img/news/e.png') }}" alt="">
                                <div class="carousel-caption">
                                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h3>
                                <p>EXPECTED GOALS05 JAN 2020</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-2"></div>
                    <div class="block bg-white">
                        <div class="news">
                            <div class="news-cover"><<img src="{{ asset('assets/img/news/a.png') }}" alt=""></div>
                            <div class="news-title">
                                <h5>STANDOUT STATISTICS FROM FANTASY PREMIER LEAGUE GW25</h5>
                                <span>EXPECTED GOALS05 FEB 2020</span>
                            </div>
                        </div>
                        <span class="news-devider"></span>
                        <div class="news">
                            <div class="news-cover"><<img src="{{ asset('assets/img/news/b.png') }}" alt=""></div>
                            <div class="news-title">
                                <h5>STANDOUT STATISTICS FROM FANTASY PREMIER LEAGUE GW25</h5>
                                <span>EXPECTED GOALS05 FEB 2020</span>
                            </div>
                        </div>
                        <span class="news-devider"></span>
                        <div class="news">
                            <div class="news-cover"><<img src="{{ asset('assets/img/news/c.png') }}" alt=""></div>
                            <div class="news-title">
                                <h5>STANDOUT STATISTICS FROM FANTASY PREMIER LEAGUE GW25</h5>
                                <span>EXPECTED GOALS05 FEB 2020</span>
                            </div>
                        </div>
                        <span class="news-devider"></span>
                        <div class="news">
                            <div class="news-cover"><<img src="{{ asset('assets/img/news/d.png') }}" alt=""></div>
                            <div class="news-title">
                                <h5>STANDOUT STATISTICS FROM FANTASY PREMIER LEAGUE GW25</h5>
                                <span>EXPECTED GOALS05 FEB 2020</span>
                            </div>
                        </div>
                        <span class="news-devider"></span>

                        <a href="#" class="btn btn-lg btn-dark w-100">See All</a>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade p-3" id="six" aria-labelledby="six-tab">
                <!-- tabs content -->
                <div class="tab-content">

                    <!-- team -->
                    <div class="league-team">
                        <div class="team"><div class="cover-img"><<img src="{{ asset('assets/img/ic-lvpl.png') }}" alt=""></div></div>
                        <div class="team"><div class="cover-img"><<img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div></div>
                        <div class="team"><div class="cover-img"><<img src="{{ asset('assets/img/ic-mancity.png') }}" alt=""></div></div>
                        <div class="team"><div class="cover-img"><<img src="{{ asset('assets/img/ic-manutd.png') }}" alt=""></div></div>
                        <div class="team"><div class="cover-img"><<img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
