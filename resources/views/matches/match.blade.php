<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/util.css">
    
    <script src="./assets/js/jquery-3.4.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    
    <title>18</title>
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

    .tag {
        text-align: center;
        font-weight: bolder;
        padding: .75em 1em;
    }

    /* matches */
    .matches {
        padding: 1em;
        margin-bottom: 1em;
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
            <li><a href="17.html">Info</a></li>
            <li class="active"><a href="18.html">Match</a></li>
            <li><a href="19.html">Player</a></li>
            <li><a href="#">Standings</a></li>
        </ul>

        <!-- tabs content -->
        <div class="tab-content">

            <div class="block bg-grey">
                <div class="dropdown">
                    <button class="btn btn-lg btn-white w-100 d-flex ais-center" type="button" data-toggle="dropdown">
                      <span class="text-grey">July 2020</span>
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
            <div class="tag"><u><b>Premier League</b></u></div>
            <div class="container-matches">
                <div class="matches">
                    <div class="d-flex j-center">
                        <div class="club-left mx-1 text-center">
                            <div class="logo"><img src="./assets/img/ic-chelsea.png" alt=""></div>
                            <h5 class="mb-0">Chelsea</h5>
                        </div>
                        <div class="mid mx-2 d-flex flex-column my-auto">
                            <div class="border radius-1 px-2 py-1">London stadium</div>
                            <h3 class="my-1">20:35 hrs</h3>
                        </div>
                        <div class="club-right mx-1 text-center">
                            <div class="logo"><img src="./assets/img/ic-albion.png" alt=""></div>
                            <h5 class="mb-0">Manchester</h5>
                        </div>
                    </div>
                </div>
                <div class="matches">
                    <div class="d-flex j-center">
                        <div class="club-left mx-1 text-center">
                            <div class="logo"><img src="./assets/img/ic-chelsea.png" alt=""></div>
                            <h5 class="mb-0">Chelsea</h5>
                        </div>
                        <div class="mid mx-2 d-flex flex-column my-auto">
                            <div class="border radius-1 px-2 py-1">London stadium</div>
                            <h3 class="my-1">20:35 hrs</h3>
                        </div>
                        <div class="club-right mx-1 text-center">
                            <div class="logo"><img src="./assets/img/ic-albion.png" alt=""></div>
                            <h5 class="mb-0">Manchester</h5>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>