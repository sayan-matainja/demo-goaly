<div class="modal fade in" tabindex="-1" role="dialog" id="howToPlay" style="display: none; background-color: rgba(0, 0, 0, 0.9);">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content intro" >
            <div class="modal-body p-0">
                <div class="intro-wrapper">
                    <div class="intro-slider">
                        <div>
                            @foreach($popupDetails as $index=>$popup)
                             <div class="intro-slider-item {{ $index }}"  style="{{ $index === 0 ? 'display: block;' : 'display: none;' }}">
                                
                                    <div class="px-2 pt-2">
                                        <div class="text-center">
                                            <img src="{{ asset('/assets/img/popup/' . $popup['logo']) }}" height="35" alt="Logo" style="margin: 0px auto;" id="introductionLogo">
                                        </div>
                                        <img class="img-responsive" src="{{ asset('/assets/img/popup/' . $popup['image']) }}" alt="Intro" id="instructionImg">
                                    </div>
                                    <div class="intro-info" style="border-radius: 10px;">
                                        <div class="container-fluid">
                                            <ul class="intro-dots" id="introductiondots">
                                                <li class="{{ $index === 0 ? 'active' : '' }}"><span class="dots"></span></li>
                                                <li class="{{ $index === 1 ? 'active' : '' }}"><span class="dots"></span></li>
                                                <li class="{{ $index === 2 ? 'active' : '' }}"><span class="dots"></span></li>
                                                <li class="{{ $index === 3 ? 'active' : '' }}"><span class="dots"></span></li>
                                            </ul>
                                            <div class="intro-desc">
                                                <h4 class="intro-title" id="instructionTitle">{{ $popup['title'] }}</h4>
                                                <p class="mb-0" id="instructionTxt">{{ $popup['quote'] }}</p>
                                            </div>
                                            @if ($index === count($popupDetails) - 1)
                                                <a id="finishBtn" class="btn text-uppercase btn-block btn-default" data-dismiss="modal" aria-hidden="true">Finish</a>
                                            @else
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <a id="nextBtn" class="btn text-uppercase btn-block btn-purple next-slide" data-step={{ $index }}>Next</a>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <a id="skipBtn" class="btn text-uppercase btn-block btn-default" data-dismiss="modal" aria-hidden="true">Skip</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>