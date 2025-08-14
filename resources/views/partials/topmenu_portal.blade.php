
<div class="menu">
    <div class="menu-link col-xs-3  {{ request()->route()->getName() === 'home' ? 'active' : '' }}" style="width: 20%">
        <a id="homeIcn" href="{{ route('home') }}"><img src="{{ asset('assets/img/icon-menu-home' . (request()->route()->getName() === 'home' ? '-active' : '') . '.png') }}" alt="Home icon"></a>
        <span id="homeTxt" class="{{ request()->route()->getName() === 'home' ? 'text-purple' : 'text-grey' }}">{{ trans('lang.Home') }}</span>
    </div>
    <div class="menu-link col-xs-3 {{ request()->route()->getName() === 'contest' || request()->route()->getName() === 'contest_detail' ? 'active' : '' }}" style="width: 20%">
        <a id="contestIcn" href="{{ route('contest') }}">
        <img src="{{ asset('assets/img/Group 169' . (request()->route()->getName() === 'contest' || request()->route()->getName() === 'contest_detail' ? '-active' : '') . '.png') }}" alt="Contest icon">
        </a>
        <span id="contestTxt" class="{{ request()->route()->getName() === 'contest' || request()->route()->getName() === 'contest_detail' ? 'text-purple' : 'text-grey' }}">
        {{ trans('lang.Contest') }}
        </span>
    </div>

    <div class="menu-link col-xs-3{{ request()->route()->getName() === 'matches' ? 'active' : '' }}" style="width: 20%">
        <a id="MatchIcn" href="{{ route('matches') }}"><img src="{{ asset('assets/img/Group 168' . (request()->route()->getName() === 'matches' ? '-active' : '') . '.png') }}" alt="Macthes icon"></a>
        <span id="MatchTxt" class="{{ request()->route()->getName() === 'matches' ? 'text-purple' : 'text-grey' }}">{{ trans('lang.Matches') }}</span>
    </div>
    <div class="menu-link col-xs-3 {{ request()->route()->getName() === 'league' ? 'active' : '' }}" style="width: 20%">
        <a id="leagueIcn" href="{{ route('league') }}"><img src="{{ asset('assets/img/Group 167' . (request()->route()->getName() === 'league' ? '-active' : '') . '.png') }}" alt="Laegue icon"></a>
        <span id="leagueTxt" class="{{ request()->route()->getName() === 'league' ? 'text-purple' : 'text-grey' }}">{{ trans('lang.League') }}</span>
    </div>
    <div class="menu-link col-xs-3 {{ request()->route()->getName() === 'newss' ? 'active' : '' }}" style="width: 20%">
        <a id="newsIcn" href="{{ route('newss') }}"><img src="{{ asset('assets/img/Group 166' . (request()->route()->getName() === 'newss' ? '-active' : '') . '.png') }}" alt="News icon"></a>
        <span id="newsTxt" class="{{ request()->route()->getName() === 'newss' ? 'text-purple' : 'text-grey' }}">{{ trans('lang.News') }}</span>
    </div>
</div>
