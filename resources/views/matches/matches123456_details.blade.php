<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/util.css">
    
    <script src="./assets/js/jquery-3.4.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    
    <title>17</title>
</head>

<style>
    /* club cover */
    .club-cover {
        background-image: url(./assets/img/asd.png);
        background-repeat: no-repeat;
        background-size: cover;
    }
    .club-cover-mask {
        background-color: #ac4cb7ca;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .inner-club-cover {
        display: flex;
        flex-direction: column;
        width: 100%;
        padding: 1.5em;
        z-index: 1;
    }
    .inner-club-cover .line {
        display: flex;
        padding: .5em;
    }
    .inner-club-cover .line.bg-purple {
        padding-top: 3em;
        padding-bottom: 1em;
        border-radius: 5px 5px 0 0;
        background-color: #72227C;
    }
    .inner-club-cover .line.bg-white {
        border-radius: 0 0 5px 5px;
    }
    .inner-club-cover .line .box:first-child {
        border-right: 1px solid #E5E5E5;
    }
    .inner-club-cover .line .box {
        padding: .5em 2em;
        width: 50%;
    }
    .inner-club-cover .line .box > h5 {margin: 0}
    .inner-club-cover .line .box > span {
        display: flex;
        align-items: center;
        font-weight: bold;
    }
    .inner-club-cover .line .box > span img {
        width: 20px;
        height: 20px;
        margin-left: .75em;
    }
    .inner-club-cover .club-logo {
        width: 75px;
        height: 75px;
        padding: 1em;
        margin: 0 auto;
        z-index: 1;
        margin-bottom: -2.5em;
        border-radius: 50%;
        background-color: white;
    }
    .inner-club-cover button {
        width: 50%;
        color: white;
        margin: 0 auto;
        margin-top: 2em;
        border-radius: 50px;
        border: .1em solid white;
        background-color: transparent;
    }
    .inner-club-cover button:focus {outline: none !important; color: white;}
    .inner-club-cover button:hover {
        color: black;
        background-color: white;
    }

    /* club menu */
    .club-menu {
        white-space: nowrap;
        overflow-x: auto;
        padding: 0;
        margin: 0;
    }
    .club-menu li {
        display: inline-block;
        min-width: 33% !important;
        text-align: center;
    }
    .club-menu li.active a {
        color: #D6CED9;
        border-bottom: .25em solid #D6CED9;
    }
    .club-menu li a {
        color: #AC4CB7;
        font-weight: bold;
        display: block;
        padding: .75em 1em;
    }

    /* club highlight */
    .club-highlight h5 {
        font-weight: bold;
        font-size: 11pt;
    }
    .club-highlight ul {
        white-space: nowrap;
        overflow-x: auto;
        padding: 0;
        margin: 0;
    }
    .club-highlight ul li {
        display: inline-block;
        padding: .75em 1em;
        margin-right: .5em;
        background-color: white;
        min-width: 25% !important;
        border-radius: 5px;
        text-align: center;
    }    
    .club-highlight ul li span:first-child {
        display: block;
        font-size: 15pt;
        font-weight: bolder;
    }
    .club-highlight ul li span:last-child {
        font-size: 9pt;
        color: #A3A3A3;
    }

    .tag {
        text-align: center;
        font-weight: bolder;
    }
    .tag span {
        display: inline-block;
        padding: .75em 1em;
    }

    /* club top player */
    .club-top-player ul {
        display: flex;
        white-space: nowrap;
        overflow-x: auto;
        margin: 0;
        padding: 0;
    }
    .club-top-player ul li {
        display: inline-block;
        white-space: normal;
        list-style: none;
        text-align: center;
        margin: 0 1em;
        min-width: 20%;
    }
    .club-top-player ul li .cover-img {
        padding: .5em;
        width: inherit;
        height: 80px;
    }
    .club-top-player ul li .cover-img img {
        max-width: 100%;
        height: 100%;
    }
    .club-top-player ul li span {
        display: block;
        font-size: 9pt;
        font-weight: lighter;
    }
    .club-top-player ul li span.btn-pill {
        line-height: 1;
        padding: .5em;
        background-color: #7CD327;
        color: white;
    }

    /* matches */
    .matches {
        padding: 1em;
        text-align: center;
        background: url(./assets/img/stadium.png) no-repeat, linear-gradient(to bottom, rgb(28, 51, 8), black);
        background-size: 100% 100%, cover;
        background-position: 0 0;
    }
    .matches .club-left, .matches .club-right {color: white}
    .matches .club-left .logo, .matches .club-right .logo {
        background-color: white;
        padding: .5em;
        border-radius: 50%;
    }
    .matches .club-left img, .matches .club-right img {width: 60px}
    .matches .mid {
        font-size: 10pt;
        color: white;
    }

    /* competion history */
    .competion-hstr {background-color: white}
    .competion-hstr h3 {margin: 0}
    .competion-hstr ul {
        display: flex;
        white-space: nowrap;
        overflow-x: auto;
        margin: 0;
        padding: .5em;
    }
    .competion-hstr li {
        display: inline-block;
        white-space: normal;
        list-style: none;
        text-align: center;
        margin: 0 1em;
        min-width: 20%;
    }
    .competion-hstr li .cover-img {
        padding: .5em;
        width: inherit;
        height: 80px;
    }
    .competion-hstr li .cover-img img {
        max-width: 100%;
        height: 100%;
    }
    .competion-hstr li span {
        display: block;
        color: #A4A3A3;
        font-size: 9pt;
        font-weight: lighter;
    }

</style>

<body>
    <div class="wrapper">
        <!-- header image -->
        <img src="./assets/img/header.png" class="img-fluid" alt="">

        <!-- league-cover -->
        <div class="club-cover">
            <div class="club-cover-mask">
                <div class="inner-club-cover">
                    <div class="club-logo"><img class="img-fluid" src="./assets/img/ic-chelsea.png" alt=""></div>
                    <div class="line bg-purple text-white">
                        <div class="box">
                            <h5>Venue :</h5>
                            <span>Stamford Bridge</span>
                        </div>
                        <div class="box">
                            <h5>City :</h5>
                            <span>Fullham</span>
                        </div>
                    </div>
                    <div class="line bg-white">
                        <div class="box">
                            <h5>League :</h5>
                            <span>EPL <img src="./assets/img/ic-epl.png" alt=""></span>
                        </div>
                        <div class="box">
                            <h5>Country :</h5>
                            <span>England <img src="./assets/img/flag-england.png" alt=""></span>
                        </div>
                    </div>
                    <button class="btn btn-lg">Follow</button>
                </div>
            </div>
        </div>

        <!-- league menu -->
        <ul class="club-menu bg-purple">
            <li class="active"><a href="17.html">Info</a></li>
            <li><a href="18.html">Match</a></li>
            <li><a href="19.html">Player</a></li>
            <li><a href="#">Standings</a></li>
        </ul>

        <!-- tabs content -->
        <div class="tab-content">

            <!-- club highlight -->
            <div class="club-highlight block bg-grey">
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

            <!-- club top player -->
            <div class="club-top-player">
                <div class="tag bg-dark d-flex text-white">
                    <span class="mr-auto">Top Player</span>
                    <span>Season 2019/2020</span>
                </div>
                <div class="p-2 bg-white">
                    <ul>
                        <li>
                            <div class="cover-img"><img src="./assets/img/face.png" alt=""></div>
                            <h5 class="my-1">Plaer Name</h5>
                            <span><strong>Top Scorer</strong></span>
                            <span class="btn-pill">
                                Score <br> 20
                            </span>
                        </li>
                        <li>
                            <div class="cover-img"><img src="./assets/img/face2.png" alt=""></div>
                            <h5 class="my-1">Plaer Name</h5>
                            <span><strong>Top Assist</strong></span>
                            <span class="btn-pill">
                                Score <br> <b>20</b>
                            </span>
                        </li>
                        <li>
                            <div class="cover-img"><img src="./assets/img/face3.png" alt=""></div>
                            <h5 class="my-1">Plaer Name</h5>
                            <span><strong>Top Assist</strong></span>
                            <span class="btn-pill">
                                Score <br> <b>20</b>
                            </span>
                        </li>
                        <li>
                            <div class="cover-img"><img src="./assets/img/face.png" alt=""></div>
                            <h5 class="my-1">Plaer Name</h5>
                            <span><strong>Top Assist</strong></span>
                            <span class="btn-pill">
                                Score <br> <b>20</b>
                            </span>
                        </li>
                        <li>
                            <div class="cover-img"><img src="./assets/img/face.png" alt=""></div>
                            <h5 class="my-1">Plaer Name</h5>
                            <span><strong>Top Assist</strong></span>
                            <span class="btn-pill">
                                Score <br> <b>20</b>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- club matches -->
            <div class="tag bg-purple d-flex text-white">
                <span class="mr-auto">Next Game</span>
                <span class="bg-whitepurple">More</span>
            </div>
            <div class="container-matches">
                <div class="matches">
                    <div class="d-flex j-center">
                        <div class="club-left mx-1 text-center">
                            <div class="logo"><img src="./assets/img/ic-chelsea.png" alt=""></div>
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
                            <div class="logo"><img src="./assets/img/ic-albion.png" alt=""></div>
                            <h5 class="mb-0">Manchester</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tag bg-purple d-flex text-white">
                <span class="mr-auto">Previous Game</span>
                <span class="bg-whitepurple">More</span>
            </div>
            <div class="container-matches">
                <div class="matches">
                    <div class="d-flex j-center">
                        <div class="club-left mx-1 text-center">
                            <div class="logo"><img src="./assets/img/ic-chelsea.png" alt=""></div>
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
                            <div class="logo"><img src="./assets/img/ic-albion.png" alt=""></div>
                            <h5 class="mb-0">Manchester</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- competion history -->
            <div class="tag bg-green d-flex text-white">
                <span class="mx-auto">Thropy</span>
            </div>
            <div class="competion-hstr">
                <ul>
                    <li>
                        <div class="cover-img">
                            <img src="./assets/img/league/Image 22@3x.png" alt="">
                        </div>
                        <h3><strong>7</strong></h3>
                        <span>Bundesliga</span>
                    </li>
                    <li>
                        <div class="cover-img">
                            <img src="./assets/img/league/Image 23@3x.png" alt="">
                        </div>
                        <h3><strong>10</strong></h3>
                        <span>Ligue 1</span>
                    </li>
                    <li>
                        <div class="cover-img">
                            <img src="./assets/img/league/Image 24@3x.png" alt="">
                        </div>
                        <h3><strong>12</strong></h3>
                        <span>La Liga</span>
                    </li>
                    <li>
                        <div class="cover-img">
                            <img src="./assets/img/league/Image 25@3x.png" alt="">
                        </div>
                        <h3><strong>2</strong></h3>
                        <span>Copa Del Rey</span>
                    </li>
                    <li>
                        <div class="cover-img">
                            <img src="./assets/img/league/Image 26@3x.png" alt="">
                        </div>
                        <h3><strong>8</strong></h3>
                        <span>Champions League</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>