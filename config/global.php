<?php
return [
    'SECRET_KEY' => 'ussd@12345',
    'ALGORITHM' => 'HS512',
    'API_KEY' => '48923c0da07a9cc111746c867c4ccf37',
    'API_SECRET' => '854b5dafcf59441773cad245f3dc32fc',
    'SMKEY' => '1dWUjLi0iGjmfk6GS2Nw6XrZWHP9GOi6iv7Ee713i7m1RsmJ8XoDDYc0W2T4',
    'API_PATH' => 'http://lp.app.see-engagement.com/api.php',
    
    'basic'                 =>'https://new-api.goaly.mobi/api/',
    // 'basic'                   => 'http://127.0.0.1:8080/api/',
    'sportsMonks_url'       =>'https://api.goaly.mobi/',

    'getLastMatchByTeam'    =>'StageSportsMonks/getlastmatch_sportsmonks',
    'matchComments&Lineup'  =>'StageSportsMonks/MatchCommentsById_sportsmonks',
    'fixtureDetails'        =>'StageSportsMonks/MatchDetails_sportsmonks',
    'matchStatsDetails'     =>'StageSportsMonks/getMatchStatsAdvance_sportsmonks',
    'getMatchPlayersStatsById'=>'StageSportsMonks/MatchPlayersStatsById_sportsmonks',
    'matchPlayerDetails'    =>'StageSportsMonks/getMatchPlayersAdvance_sportsmonks',
    'handTwoHand'           =>'StageSportsMonks/getHeadToHead_sportsmonks',

    'clubDetails'            =>'StageSportsMonks/clubDetails_sportsmonks',
    'clubTrophies'           =>'StageSportsMonks/clubTrophies_sportsmonks',
    'MatchesByRound'            =>'StageSportsMonks/clubMatchesByRound_sportsmonks',
    'teamscoredetails'       =>'StageSportsMonks/teamSeaasonDetails_sportsmonks',
    'clubLastAndPreMatch'    =>'StageSportsMonks/clubLastAndPreMatch_sportsmonks',
    'clubStanding'           =>'StageSportsMonks/standingForTeam_sportsmonks',
    'clubTopPlayers'          =>'StageSportsMonks/clubTopScorer_sportsmonks',
    'teamSeasonInfo'        =>'StageSportsMonks/clubSeasonInfo_sportsmonks',
    'teamPlayers'           =>'StageSportsMonks/clubPlayers_sportsmonks',

    'liveMatchDetailsUrl'   =>'SportsMonks/liveMatches_sportsmonks',
    'hottes'                =>'StageSportsMonks/hottestnews_sportsmonks',
    'latest'                =>'SportsMonks/latestnews_sportsmonks',
    'transfer'              =>'SportsMonks/newsByLeagueForTransfer_sportsmonks',
    'videos'                =>'StageSportsMonks/highLightVideo_sportsmonks',
    'newsForTeam'           =>'SportsMonks/newsForTeamDetails_sportsmonks',    
    'matchesByFavTeam'      =>'StageSportsMonks/favTeamMatches_sportsmonks',    
    'getMatchnews'          =>'StageSportsMonks/getmatchnews_sportsmonks',

    'playerbasicstats'      =>'StageSportsMonks/playersStats_sportsmonks',
    'playeradvstats'        =>'StageSportsMonks/playersAdvance_sportsmonks',
    'playersMatches'        =>'StageSportsMonks/playerMatches_sportsmonks',
    'playerInfoPageMatches' =>'StageSportsMonks/playerInfoPageMatches_sportsmonks',
    'getPlayerNews'         =>'StageSportsMonks/newsForPlayersDetails_sportsmonks',

    'MatchByLeague'         =>'admin/Predictionmatch/getMatchByLeague',
    'lastAndNextMatch'      =>'StageSportsMonks/getLastNextMatchMatch_sportsmonks',
    'matchesByRound'         =>'StageSportsMonks/matchesByRound_sportsmonks',
    'leagueDetail'          =>'StageSportsMonks/leagueDetails_sportsmonks',
    'leagueStats'           =>'StageSportsMonks/statsByCurrenctSeason_sportsmonks',
    'leagueSeasonInfo'      =>'StageSportsMonks/leagueSeasonInfo_sportsmonks',
    'leagueTopPlayers'      =>'StageSportsMonks/leagueTopPlayers_sportsmonks',
    'roundByLeague'         =>'StageSportsMonks/roundByLeague_sportsmonks',
    'leagueStanding'        =>'StageSportsMonks/standingByCurrenctSeason_sportsmonks',
    'leagueTeam'            =>'StageSportsMonks/teams_sportsmonks',
    'leagueNews'            =>'StageSportsMonks/allLeagueNews_sportsmonks',

    'getmatches'            =>'getMatches',
    'liveMatches'           =>'liveMatches',
    'getMatchDetails'       =>'getMatchDetails',
    'getTeamDetails'        =>'getTeamDetails',    
    'playerByname'           =>'playerByname',    
    'live_status'           => array("LIVE","HT","BREAK","ET","PEN_LIVE"),
    'finish_match_status'   => array("FT","AET","FT_PEN"),
    'future_match_status'   => array("NS","TBA"),
    ]


//there are two more projects  1.new-api.goaly.mobi/(laravel) ,2.http://api.goaly.mobi/(CI)StageSportsMonks or sportsmonk apis are related to 2. 
?>
