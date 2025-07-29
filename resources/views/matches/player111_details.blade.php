@include('partials.headernew')
</head>
<body>
    <div class="wrapper">
        <!-- header image -->
        <img src="../assets/img/header.png" class="img-fluid" alt="">

        <div class="block bg-whitepurple">
            <!-- player-cover -->
            <div class="player-cover">
                <div class="pict">
                    <img class="a" src="{{(isset($player['image_path']) ? $player['image_path']: '')}}" alt="">
                    <img class="b" src="{{(isset($player['team_logo']) ? $player['team_logo']: '')}}" alt="">
                </div>
                <h5 class="name">Ben Chilwell</h5>
                <div class="pos">
                    <span>1</span>
                    <span>GK</span>
                    <span><i class="icon icon-star small" style="color: yellow;"></i> 7.5</span>
                </div>
            </div>
        </div>

        <!-- plyer menu -->
        <ul class="player-menu bg-purple">
            <li><a href="6.html">Info</a></li>
            <li><a href="7.html">Match</a></li>
            <li class="active"><a href="8.html">Stats</a></li>
            <li><a href="#">News</a></li>
        </ul>

        <!-- tabs content -->
        <div class="tab-content">

            <!-- player main stats -->
            <div class="block bg-grey">

                <div class="row min-gutter mb-2">
                    <div class="col-xs-6 col md-6 col-lg-6">
                        <a href="#" class="btn btn-block btn-cta-premium active">Basic Stats</a>
                    </div>
                    <div class="col-xs-6 col md-6 col-lg-6">
                        <a href="player-stats-advance.html" class="btn btn-block btn-cta-premium" id="btnPremium"><span class="icon icon-external-link"></span> Advance Stats</a>
                    </div>
                </div>

                <div class="player-stats-main block bg-white shadow radius-1">
                    <div class="box border-right border-bottom">Match Played<br><strong>3</strong></div>
                    <div class="box border-bottom border-left">Pass Accuracy<br><strong>{{(isset($player['pass_accurate']) ? $player['pass_accurate']: '')}}</strong></div>
                    <div class="w-100 d-flex j-center">
                        <div class="progress-circle c100 p75 m-0 green" style="margin: -13% 0px;"><span><strong>Goals</strong><span>0</span></span>
                            <div class="slice">
                                <div class="bar"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box border-top border-right"><strong>255</strong> <br>Minutes</div>
                    <div class="box border-left border-top"><strong>80</strong> <br>Dribble</div>
                </div>
            </div>

            <!-- player stats detail -->
            <div class="player-stats-detail block" style="background-color: rgb(255, 255, 255);">
                <h3 class="m-0 p-1 bg-dark text-white text-center">Attacks</h3>
                <div class="block bg-white shadow">
                    <ul>
                        <li><span>Goals</span><span>{{(isset($player['goals']) ? $player['goals']: '')}}</span></li>
                        <li><span>Penalties Scores</span><span>{{(isset($player['penalty_scores']) ? $player['penalty_scores']: '')}}</span></li>
                        <li><span>Duels Won</span><span>{{(isset($player['duel_own']) ? $player['duel_own']: '')}}</span></li>
                        <li><span>Total Shots</span><span>{{(isset($player['short_total']) ? $player['short_total']: '')}}</span></li>
                        <li><span>Shots on Target</span><span>{{(isset($player['short_on_target']) ? $player['short_on_target']: '')}}</span></li>
                        <li><span>Shots off target</span><span>{{(isset($player['short_off_target']) ? $player['short_off_target']: '')}}</span></li>
                        <li><span>Dribbles</span><span>{{(isset($player['dribbles_success']) ? $player['dribbles_success']: '')}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="player-stats-detail block" style="background-color: rgb(255, 255, 255);">
                <h3 class="m-0 p-1 bg-dark text-white text-center">Team Play</h3>
                <div class="block bg-white shadow">
                    <ul>
                        <li><span>Crosses</span><span>{{(isset($player['cross_total']) ? $player['cross_total']: '')}}</span></li>
                        <li><span>Cross Accurate</span><span>{{(isset($player['crosses_accurate']) ? $player['crosses_accurate']: '')}}</span></li>
                        <li><span>Passes</span><span>{{(isset($player['pass_total']) ? $player['pass_total']: '')}}</span></li>
                        <li><span>Assists</span><span>{{(isset($player['assist']) ? $player['assist']: '')}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="player-stats-detail block" style="background-color: rgb(255, 255, 255);">
                <h3 class="m-0 p-1 bg-dark text-white text-center">Defences</h3>
                <div class="block bg-white shadow">
                    <ul>
                        <li><span>Tackle</span><span>{{(isset($player['tackles']) ? $player['tackles']: 0)}}</span></li>
                        <li><span>Interception</span><span>{{(isset($player['interception']) ? $player['interception']: 0)}}</span></li>
                        <li><span>Fouls Drawn</span><span>{{(isset($player['foul_drawn']) ? $player['foul_drawn']: 0)}}</span></li>
                        <li><span>Blocks</span><span>{{(isset($player['blocks']) ? $player['blocks']: 0)}}</span></li>
                        <li><span>Own Goals</span><span>{{(isset($player['goals']) ? $player['goals']: 0)}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="player-stats-detail block" style="background-color: rgb(255, 255, 255);">
                <h3 class="m-0 p-1 bg-dark text-white text-center">Discipline</h3>
                <div class="block bg-white shadow">
                    <ul>
                        <li><span>Yellow card</span><span>{{(isset($player['yellow_card']) ? $player['yellow_card']: 0)}}</span></li>
                        <li><span>Red Card</span><span>{{(isset($player['red_card']) ? $player['red_card']: '0')}}</span></li>
                        <li><span>Fouls</span><span>{{(isset($player['foul_commited']) ? $player['foul_commited']: 0)}}</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="modal modal-premium fade" tabindex="-1" role="dialog" id="modalPremium">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <div class="mb-2">
                            <img src="../assets/img/icon-lock-premium.png" class="img-responsive mb-1" style="margin-left: auto; margin-right: auto;" width="35" alt="Lock">
                            <p>Enjoy This Premium Feature by Subscribe Goaly</p>
                        </div>
                        <a href="player-stats-advance.html" class="btn btn-lg btn-block bg-green mt-2 mb-1 text-white rounded-pill"><strong>Subscribes</strong></a>
                        <a data-dismiss="modal" aria-label="Close" class="text-muted small">No, Thanks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        $(document).ready(function() {
            $('#btnPremium').click(function() {
                $('#modalPremium').modal('show')
            })
        })
    </script> -->

</body>
</html>

