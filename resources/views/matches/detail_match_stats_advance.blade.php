

<div class="premium">
                <div class="detail-match bg-whitesmoke">
                        <div class="detail-match-stats container-fluid">
                            @if(isset($stat) && !empty($stat))
                  <div class="detail-match-stats-group">
                    <div>
                        <h3><span id="shotsTitle">{{ trans('lang.Shots') }}</span></h3>
                    </div>
                    <!-- data item start -->
                    <div class="detail-match-stats-item">
                        <div class="detail-match-stats-item-point">
                            <div class="row">
                                <div class="col-xs-3 point-left" id="totalShotsLValue">
                                    {{ !empty($stat['0']['shots_total']) ? $stat['0']['shots_total'] : '0' }}
                                </div>
                                <div class="col-xs-6 point-center" id="totalShotsVar">
                                    Total Shots
                                </div>
                                <div class="col-xs-3 point-right" id="totalShotsRValue">
                                    {{ !empty($stat['1']['shots_total']) ? $stat['1']['shots_total'] : '0' }}
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            @if ($stat['0']['shots_total'] == 0 && $stat['1']['shots_total'] == 0)
                                <div class="progress-bar" style="width: 50%"></div>
                            @else
                                <div class="progress-bar"
                                    style="width: {{ ($stat['0']['shots_total'] / ($stat['0']['shots_total'] + $stat['1']['shots_total'])) * 100 }}%"></div>
                            @endif
                        </div>
                    </div>
                    <!-- data item end -->
                </div>

                <div class="detail-match-stats-group">
                    <div>
                        <h3><span id="passesTitle">Passes</span></h3>
                    </div>
                    <!-- data item start -->
                    <div class="detail-match-stats-item">
                        <div class="detail-match-stats-item-point">
                            <div class="row">
                                <div class="col-xs-3 point-left" id="totalPassesLValue">
                                    {{ !empty($stat['0']['passes']['total']) ? $stat['0']['passes']['total'] : '0' }}
                                </div>
                                <div class="col-xs-6 point-center" id="totalPassesVar">
                                    {{ trans('lang.Total Passes') }}
                                </div>
                                <div class="col-xs-3 point-right" id="totalPassesRValue">
                                    {{ !empty($stat['1']['pass_total']) ? $stat['1']['pass_total'] : '0' }}
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            @if ($stat['0']['pass_total'] == 0 && $stat['1']['pass_total'] == 0)
                                <div class="progress-bar" style="width: 50%"></div>
                            @else
                                <div class="progress-bar"
                                    style="width: {{ ($stat['0']['pass_total'] / ($stat['0']['pass_total'] + $stat['1']['pass_total'])) * 100 }}%"></div>
                            @endif
                        </div>
                    </div>
                    <!-- data item end -->
                </div>

                <div class="detail-match-stats-group">
                    <div>
                        <h3><span id="attacksTitle">{{ trans('lang.Attacks') }}</span></h3>
                    </div>
                    <!-- data item start -->
                    <div class="detail-match-stats-item">
                        <div class="detail-match-stats-item-point">
                            <div class="row">
                                <div class="col-xs-3 point-left" id="attackLValue">
                                    {{ !empty($stat['0']['attacks']) ? $stat['0']['attacks'] : '0' }}
                                </div>
                                <div class="col-xs-6 point-center" id="attackVar">
                                    Attacks
                                </div>
                                <div class="col-xs-3 point-right" id="attackRValue">
                                    {{ !empty($stat['1']['attacks']) ? $stat['1']['attacks'] : '0' }}
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            @if ($stat['0']['attacks'] == 0 && $stat['1']['attacks'] == 0)
                                <div class="progress-bar" style="width: 50%"></div>
                            @else
                                <div class="progress-bar"
                                    style="width: {{ ($stat['0']['attacks'] / ($stat['0']['attacks'] + $stat['1']['attacks'])) * 100 }}%"></div>
                            @endif
                        </div>
                    </div>
                    <!-- data item end -->
                    <!-- data item start -->
                    <div class="detail-match-stats-item">
                        <div class="detail-match-stats-item-point">
                            <div class="row">
                                <div class="col-xs-3 point-left" id="dangerousAttackLValue">
                                    {{ !empty($stat['0']['attacks_dangerous_attacks']) ? $stat['0']['attacks_dangerous_attacks'] : '0' }}
                                </div>
                                <div class="col-xs-6 point-center" id="dangerousAttackVar">
                                    {{ trans('lang.Dangerous Attacks') }}
                                </div>
                                <div class="col-xs-3 point-right" id="dangerousAttackRValue">
                                    {{ !empty($stat['1']['attacks_dangerous_attacks']) ? $stat['1']['attacks_dangerous_attacks'] : '0' }}
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            @if ($stat['0']['attacks_dangerous_attacks'] == 0 && $stat['1']['attacks_dangerous_attacks'] == 0)
                                <div class="progress-bar" style="width: 50%"></div>
                            @else
                                <div class="progress-bar"
                                    style="width: {{ ($stat['0']['attacks_dangerous_attacks'] / ($stat['0']['attacks_dangerous_attacks'] + $stat['1']['attacks_dangerous_attacks'])) * 100 }}%"></div>
                            @endif
                        </div>
                    </div>
                    <!-- data item end -->
                </div>

                <div class="detail-match-stats-group">
                    <div>
                        <h3><span id="cardsTitle">Cards</span></h3>
                    </div>
                    <!-- data item start -->
                    <div class="detail-match-stats-item">
                        <div class="detail-match-stats-item-point">
                            <div class="row">
                                <div class="col-xs-3 point-left" id="redCardLValue">
                                    {{ !empty($stat['0']['redcards']) ? $stat['0']['redcards'] : '0' }}
                                </div>
                                <div class="col-xs-6 point-center" id="redCardVar">
                                    {{ trans('lang.Red Cards') }}
                                </div>
                                <div class="col-xs-3 point-right" id="redCardRValue">
                                    {{ !empty($stat['1']['redcards']) ? $stat['1']['redcards'] : '0' }}
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            @if ($stat['0']['redcards'] == 0 && $stat['1']['redcards'] == 0)
                                <div class="progress-bar" style="width: 50%"></div>
                            @else
                                <div class="progress-bar"
                                    style="width: {{ ($stat['0']['redcards'] / ($stat['0']['redcards'] + $stat['1']['redcards'])) * 100 }}%"></div>
                            @endif
                        </div>
                    </div>
                    <!-- data item end -->
                    <!-- data item start -->
                    <div class="detail-match-stats-item">
                        <div class="detail-match-stats-item-point">
                            <div class="row">
                                <div class="col-xs-3 point-left" id="yellowCardLValue">
                                    {{ !empty($stat['0']['yellowcards']) ? $stat['0']['yellowcards'] : '0' }}
                                </div>
                                <div class="col-xs-6 point-center" id="yellowCardVar">
                                    Yellow Cards
                                </div>
                                <div class="col-xs-3 point-right" id="yellowCardRValue">
                                    {{ !empty($stat['1']['yellowcards']) ? $stat['1']['yellowcards'] : '0' }}
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            @if ($stat['0']['yellowcards'] == 0 && $stat['1']['yellowcards'] == 0)
                                <div class="progress-bar" style="width: 50%"></div>
                            @else
                                <div class="progress-bar"
                                    style="width: {{ ($stat['0']['yellowcards'] / ($stat['0']['yellowcards'] + $stat['1']['yellowcards'])) * 100 }}%"></div>
                            @endif
                        </div>
                    </div>
                    <!-- data item end -->
                </div>


                <div class="detail-match-stats-group">
                    <div>
                        <h3><span id="othersTitle">{{ trans('lang.Others') }}</span></h3>
                    </div>
                    <!-- data item start -->
                    <div class="detail-match-stats-item">
                        <div class="detail-match-stats-item-point">
                            <div class="row">
                                <div class="col-xs-3 point-left" id="foulsLValue">
                                    {{!empty($stat['0']['fouls'])?$stat['0']['fouls']:'0' }}
                                </div>
                                <div class="col-xs-6 point-center" id="foulsVar">
                                    Fouls
                                </div>
                                <div class="col-xs-3 point-right" id="foulsRValue">
                                    {{!empty($stat['1']['fouls'])? $stat['1']['fouls']:'0'}}
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            @if ($stat['0']['fouls'] == 0 && $stat['1']['fouls'] == 0 )
                                <div class="progress-bar" style="width: 50%"></div>
                            @else
                                <div class="progress-bar" style="width: {{ ($stat['0']['fouls'] / ($stat['0']['fouls'] + $stat['1']['fouls'])) * 100 }}%"></div>
                            @endif
                        </div>
                    </div>
                    <!-- data item end -->
                    <!-- data item start -->
                    <div class="detail-match-stats-item">
                        <div class="detail-match-stats-item-point">
                            <div class="row">
                                <div class="col-xs-3 point-left" id="offsidesLValue">
                                    {{!empty($stat['0']['offsides'])?$stat['0']['offsides']:'0' }}
                                </div>
                                <div class="col-xs-6 point-center" id="offsidesVar">
                                    {{ trans('lang.Offsides') }}
                                </div>
                                <div class="col-xs-3 point-right" id="offsidesRValue">
                                    {{!empty($stat['1']['offsides'])?$stat['1']['offsides']:'0' }}
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            @if ($stat['0']['offsides'] == 0 && $stat['1']['offsides'] == 0 )
                                <div class="progress-bar" style="width: 50%"></div>
                            @else
                                <div class="progress-bar" style="width: {{ ($stat['0']['offsides'] / ($stat['0']['offsides'] + $stat['1']['offsides'])) * 100 }}%"></div>
                            @endif
                        </div>
                    </div>
                    <!-- data item end -->
                    <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="possessionOnTimeLValue">
                                        {{ !empty($stat['0']['possessiontime']) ? $stat['0']['possessiontime'] : '0' }}%
                                    </div>
                                    <div class="col-xs-6 point-center" id="possessionOnTimeVar">
                                        {{ trans('lang.Possession on Time') }}
                                    </div>
                                    <div class="col-xs-3 point-right" id="possessionOnTimeRValue">
                                        {{ !empty($stat['1']['possessiontime']) ? $stat['1']['possessiontime'] : '0' }}%
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['possessiontime'] == 0 && $stat['1']['possessiontime'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['possessiontime'] / ($stat['0']['possessiontime'] + $stat['1']['possessiontime'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="savesLValue">
                                        {{ !empty($stat['0']['saves']) ? $stat['0']['saves'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="savesVar">
                                        {{ trans('lang.Saves') }}
                                    </div>
                                    <div class="col-xs-3 point-right" id="savesRValue">
                                        {{ !empty($stat['1']['saves']) ? $stat['1']['saves'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['saves'] == 0 && $stat['1']['saves'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['saves'] / ($stat['0']['saves'] + $stat['1']['saves'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="substitutionsLValue">
                                        {{ !empty($stat['0']['substitutions']) ? $stat['0']['substitutions'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="substitutionsVar">
                                        Substitutions
                                    </div>
                                    <div class="col-xs-3 point-right" id="substitutionsRValue">
                                        {{ !empty($stat['1']['substitutions']) ? $stat['1']['substitutions'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['substitutions'] == 0 && $stat['1']['substitutions'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['substitutions'] / ($stat['0']['substitutions'] + $stat['1']['substitutions'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="goalKickLValue">
                                        {{ !empty($stat['0']['goal_kick']) ? $stat['0']['goal_kick'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="goalKickVar">
                                        {{ trans('lang.Goal Kicks') }}
                                    </div>
                                    <div class="col-xs-3 point-right" id="goalKickRValue">
                                        {{ !empty($stat['1']['goal_kick']) ? $stat['1']['goal_kick'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['goal_kick'] == 0 && $stat['1']['goal_kick'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['goal_kick'] / ($stat['0']['goal_kick'] + $stat['1']['goal_kick'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="goalAttemptsLValue">
                                        {{ !empty($stat['0']['goal_attempts']) ? $stat['0']['goal_attempts'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="goalAttemptsVar">
                                        Goal Attempts
                                    </div>
                                    <div class="col-xs-3 point-right" id="goalAttemptsRValue">
                                        {{ !empty($stat['1']['goal_attempts']) ? $stat['1']['goal_attempts'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['goal_attempts'] == 0 && $stat['1']['goal_attempts'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['goal_attempts'] / ($stat['0']['goal_attempts'] + $stat['1']['goal_attempts'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="freeKicksLValue">
                                        {{ !empty($stat['0']['free_kick']) ? $stat['0']['free_kick'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="freeKicksVar">
                                        {{ trans('lang.Free Kicks') }}
                                    </div>
                                    <div class="col-xs-3 point-right" id="freeKicksRValue">
                                        {{ !empty($stat['1']['free_kick']) ? $stat['1']['free_kick'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['free_kick'] == 0 && $stat['1']['free_kick'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['free_kick'] / ($stat['0']['free_kick'] + $stat['1']['free_kick'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="throwInLValue">
                                        {{ !empty($stat['0']['throw_in']) ? $stat['0']['throw_in'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="throwInVar">
                                        {{ trans('lang.Throw In') }}
                                    </div>
                                    <div class="col-xs-3 point-right" id="throwInRValue">
                                        {{ !empty($stat['1']['throw_in']) ? $stat['1']['throw_in'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['throw_in'] == 0 && $stat['1']['throw_in'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['throw_in'] / ($stat['0']['throw_in'] + $stat['1']['throw_in'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="ballSafeLValue">
                                        {{ !empty($stat['0']['ball_safe']) ? $stat['0']['ball_safe'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="ballSafeVar">
                                        {{ trans('lang.Ball Safe') }}
                                    </div>
                                    <div class="col-xs-3 point-right" id="ballSafeRValue">
                                        {{ !empty($stat['1']['ball_safe']) ? $stat['1']['ball_safe'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['ball_safe'] == 0 && $stat['1']['ball_safe'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['ball_safe'] / ($stat['0']['ball_safe'] + $stat['1']['ball_safe'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="penaltiesLValue">
                                        {{ !empty($stat['0']['penalties']) ? $stat['0']['penalties'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="penaltiesVar">
                                        {{ trans('lang.Penalties') }}
                                    </div>
                                    <div class="col-xs-3 point-right" id="penaltiesRValue">
                                        {{ !empty($stat['1']['penalties']) ? $stat['1']['penalties'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['penalties'] == 0 && $stat['1']['penalties'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['penalties'] / ($stat['0']['penalties'] + $stat['1']['penalties'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->
                        <!-- data item start -->
                        <div class="detail-match-stats-item">
                            <div class="detail-match-stats-item-point">
                                <div class="row">
                                    <div class="col-xs-3 point-left" id="injuriesLValue">
                                        {{ !empty($stat['0']['injuries']) ? $stat['0']['injuries'] : '0' }}
                                    </div>
                                    <div class="col-xs-6 point-center" id="injuriesVar">
                                        {{ trans('lang.Injuries') }}
                                    </div>
                                    <div class="col-xs-3 point-right" id="injuriesRValue">
                                        {{ !empty($stat['1']['injuries']) ? $stat['1']['injuries'] : '0' }}
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                @if ($stat['0']['injuries'] == 0 && $stat['1']['injuries'] == 0)
                                    <div class="progress-bar" style="width: 50%"></div>
                                @else
                                    <div class="progress-bar" style="width: {{ ($stat['0']['injuries'] / ($stat['0']['injuries'] + $stat['1']['injuries'])) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                        <!-- data item end -->


                    </div>




                        @else
                        <div class="col-12 text-center">
                            <img src="{{ asset('assets/img/detail-match/icon-menu/no-data.png') }}" style="height: 100px; padding: 11px;">
                            <div>
                                <span style="font-weight: 800;">{{ trans('lang.NO DATA') }}</span>
                            </div>
                            <div>{{ trans('lang.YET FOR THIS MATCH') }}</div>
                        </div>

                        @endif
                        </div>
                    </div>
                </div>





      

         <div class="premium-alert">
            <img src="{{asset('assets/img/icon-lock-premium.png')}}" class="img-responsive mb-2" style="margin-left: auto; margin-right: auto;" width="30" alt="Lock">
            <h3>{{ trans('lang.This Is a Part of Goaly Premium') }}</h3>
            <p class="mb-1">{{ trans('lang.Get full access to all feature by subscribe Goaly') }}</p>
            <a href="#" class="btn btn-lg btn-block btn-default my-1 bg-green text-white btn-subscribe">{{ trans('lang.Subscribe') }}</a>
            <p>{{ trans('lang.Already Subsribe?') }} <a class="text-purple" href="{{route('logined')}}">Login</a></p>
        </div>


