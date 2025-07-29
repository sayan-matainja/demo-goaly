@php
    $team1Value = $matchstats_raw['match_statsdetails'][0][$statKey] ?? 0;
    $team2Value = $matchstats_raw['match_statsdetails'][1][$statKey] ?? 0;
    $bothZero = ($team1Value == 0 && $team2Value == 0);
    $team1Width = $bothZero ? 100 : ($team1Value / ($team1Value + $team2Value) * 100);
    $team2Width = $bothZero ? 0 : ($team2Value / ($team1Value + $team2Value) * 100);
@endphp

<div class="stats-item">
    @if(!$bothZero)
        <div class="point-left" style="width: {{ $team1Width }}%;">
            {{ $team1Value }}
        </div>
        <div class="point-name">{{ trans('lang.' .$statsLabel) }}</div>
        <div class="point-right" style="width: {{ $team2Width }}%;">
            {{ $team2Value }}
        </div>
    @else
        <div class="point-zero-stats">
            <span class="left-zero">{{ $team1Value }}</span>
            <span class="center-label">{{ trans('lang.' . $statsLabel) }}</span>
            <span class="right-zero">{{ $team2Value }}</span>
        </div>
    @endif
</div>
