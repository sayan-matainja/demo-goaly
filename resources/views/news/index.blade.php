@include('partials.header_portal')

</head>
<style>
  .video-box.embed-responsive.embed-responsive-16by9.video-listing {
    height: 100%;
}
.embed-responsive .embed-responsive-item, .embed-responsive embed, .embed-responsive iframe, .embed-responsive object, .embed-responsive video {
    height: revert-layer;
}
.HorizontalScroll.HorizontalScrollTouch {
    display: none;
}
.VideoPlayerStoriesC {
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    box-shadow: 0 2px 12px -1px #eee;
    display: none !important;
}

.EmbedCodeWrapper {
    padding: 10px;
    display: none !important;
}
.video-box.embed-responsive.embed-responsive-16by9.video-listing {
    margin-bottom: 6px;
    height: 0 !important;
}
.BatFeedCLT {
    padding: 10px;
    display: none !important;
}
.BatFeedCRT {
    padding: 10px;
    display: none !important;
}
#articleImg{
    width: 1080 px;
    aspect-ratio: 3/2;
}
</style>

<body>
    <div >
        @include('partials.topmenubar_portal')
        <!-- <div class="clearfix"></div> -->
        @include('partials.sidebar_portal_new')
        <div class="page-content">

            
        <div class="block bg-grey">
            <!-- menu -->
            @include('partials.topmenu_portal')
            
            <!-- menu -->
        </div>


        <div class="block">
        <div class="d-flex" style="margin-top: -4.75em;">
                
            
           
            <!-- filter days -->
            <ul class="filter-days">

                <a class="nav-link" id="hottestTab" onclick="myFunction(1)" data-toggle="tab" href="#hottest" role="tab" aria-controls="" aria-selected="false">
                <li class="btn border radius-1 {{ $newsType == 'Hottest News' ? 'activ' : '' }}" id="hottest1">{{ trans('lang.Hottest') }}</li>
                    </a>
                <a class="nav-link" id="latestTab" onclick="myFunction(2)" data-toggle="tab" href="#latest" role="tab" aria-controls="" aria-selected="true">
                <li class="btn border radius-1 {{ ($newsType == 'Latest News' || $newsType == 'Latest' || empty($newsType)) ? 'activ' : '' }}" id="latest2">{{ trans('lang.Latest') }}</li>
                    </a>
                <a class="nav-link" id="transferTab" onclick="myFunction(3)" data-toggle="tab" href="#transfer" role="tab" aria-controls="" aria-selected="false">
                <li class="btn border radius-1 {{ $newsType == 'Transfer News' ? 'activ' : '' }}" id="transfer3">{{ trans('lang.Transfer') }}</li></a>
                <a class="nav-link" id="videoTab" onclick="myFunction(4)" data-toggle="tab" href="#videos" role="tab" aria-controls="" aria-selected="false">
                <li class="btn border radius-1 filter-days-active" id="video4">{{ trans('lang.Video') }}</li></a>
                
            </ul>
            <!-- filter days -->
        </div>
    </div>

        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade p-3 {{ $newsType == 'Latest News' || $newsType == 'Latest' ? 'active in' : '' }}" id="latest" aria-labelledby="latestTab">
                  
                <!-- slider start -->
             
              <div class="container" style="padding: 5px">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2700">
                    
                  <!-- Indicators -->
                  <ol class="carousel-indicators" id="dots">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
              
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    @foreach ($latestnews as $key=>$news)
                                      
                       @if($key<=2)
                       @if($key==0)
                     <div class="item active">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"style="border-radius: 9px" id="articleSliderImg">
               
                       <div class="post-body">
                                               <p class="slider-heading" id="articleSliderTitle">{{$news['title']}}</p>
                                                <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                    {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                                </p>
                                            
                                           </div>
                                         </a>
                     </div>
                      @elseif($key == 1)
                     <div class="item">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';" style="border-radius: 9px" id="articleSliderImg">
                       <div class="post-body">
                                               <p class="slider-heading" id="articleSliderTitle">{{$news['title']}}</p>
                                               <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                            </p>
                                            
                                           </div>
                                         </a>
                     </div>
                     @else
                     <div class="item">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"style="border-radius: 9px" id="articleSliderImg">
                       <div class="post-body">
                                               <p class="slider-heading" id="articleSliderTitle">{{$news['title']}}</p>
                                               <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                            </p>                                            
                                           </div>
                                         </a>
                     </div>
                     @endif
                       @endif
                     @endforeach
                   </div>
              
                </div>
              </div>
              
                                 <!-- slider end --> 

                                 <div class="team col-xs-12 ct">
                                  @foreach ($latestnews as $key=>$news)
                                 
                                  <div class="row listing" style="margin-top:15px">
                                    <div class="col-xs-6">
                                      <a href="{{$news['url']}}" style="border-radius: 9px"><img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"alt="" style="margin-bottom: 20px; border-radius:9px" id="articleImg"></a>
                                    </div>
                                    <div class="col-xs-6">
                                      <h5 class="title-cat" id="articleTitle">{{$news['title']}}</h5>
                                     <span style="color:#B1B1B1" id="newsPortal">{{$news['name']}}</span>
                                    <p href="" style="color:#B1B1B1" id="articleDate">
                                        {{ \Carbon\Carbon::parse($news['publishedAt'])->format('D, d/m/y') }}
                                    </p>
                                    </div>
                                  </div>
                                  
                                  @endforeach
                                  <a class="btn btn-lg btn-dark w-100" id="showMoreBtn" style="color: white;margin-bottom:12px">{{ trans('lang.SHOW MORE') }}</a>
                                </div>
                              </div>
   

            <!--latest news end -->


            <div class="tab-pane fade p-3 {{ $newsType == 'Hottest News' ? 'active in' : '' }}" id="hottest" aria-labelledby="hottestTab">
                 <!-- slider start -->
             
              <div class="container" style="padding: 5px">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2700">
                    
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
              
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    @foreach ($hottestnews as $key=>$news)
                                      
                       @if($key<=2)
                       @if($key==0)
                     <div class="item active">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"style="border-radius: 9px" id="articleSliderImg">
               
                       <div class="post-body">
                                               <p class="slider-heading" id="articleSliderTitle">{{$news['title']}}</p>
                                               <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                            </p>
                                           </div>
                                         </a>
                     </div>
                      @elseif($key == 1)
                     <div class="item">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"style="border-radius: 9px" id="articleSliderImg">
                       <div class="post-body">
                                               <p class="slider-heading" id="articleSliderTitle">{{$news['title']}}</p>
                                               <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                            </p>
                                           </div></a>
                     </div>
                     @else
                     <div class="item">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"style="border-radius:9px" id="articleSliderImg">
                       <div class="post-body">
                                               <p class="slider-heading" id="articleSliderTitle">{{$news['title']}}</p>
                                               <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                            </p>
                                           </div></a>
                     </div>
                     @endif
                       @endif
                     @endforeach
                   </div>
              
                </div>
              </div>
              
                                 <!-- slider end --> 
                <div class="team col-xs-12 ct">
                                  @foreach ($hottestnews as $key=>$news)
                                  
                                  <div class="row hottest_listing" style="margin-top:15px">
                                    <div class="col-xs-6">
                                      <a href="{{$news['url']}}" style="border-radius: 9px"><img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"alt="" style="margin-bottom: 20px; border-radius:9px" id="articleImg"></a>
                                    </div>
                                    <div class="col-xs-6">
                                      <h5 class="title-cat" id="articleTitle">{{$news['title']}}</h5>
                                     <span style="color:#B1B1B1" id="newsPortal">{{$news['name']}}</span>
                                    <p href="" style="color:#B1B1B1" id="articleDate">
                                        {{ \Carbon\Carbon::parse($news['publishedAt'])->format('D, d/m/y') }}
                                    </p>
                                    </div>
                                  </div>
                                  
                                  @endforeach
                                  <a class="btn btn-lg btn-dark w-100" id="hottestLoadMore" style="color: white;margin-bottom:12px">{{ trans('lang.SHOW MORE') }}</a>
                                </div>
            </div>

            <!-- transfernews news start-->

            <div class="tab-pane fade p-3 {{ $newsType == 'Transfer News' ? 'active in' : '' }}" id="transfer" aria-labelledby="transferTab">
                 <!-- slider start -->
             
              <div class="container" style="padding: 5px">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2700">
                    
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
              
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    @foreach ($transfernews as $key=>$news)
                                      
                       @if($key<=2)
                       @if($key==0)
                     <div class="item active">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"style="border-radius: 9px" id="articleSliderImg">
               
                       <div class="post-body">
                                               <p class="slider-heading"id="articleSliderTitle">{{$news['title']}}</p>
                                               <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                            </p>
                                           </div>
                                         </a>
                     </div>
                      @elseif($key == 1)
                     <div class="item">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';" style="border-radius: 9px" id="articleSliderImg">
                       <div class="post-body">
                                               <p class="slider-heading"id="articleSliderTitle">{{$news['title']}}</p>
                                               <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                            </p>
                                           </div></a>
                     </div>
                     @else
                     <div class="item">
                      <a href="{{$news['url']}}" >
                       <img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';" style="border-radius: 9px" id="articleSliderImg">
                       <div class="post-body">
                                               <p class="slider-heading"id="articleSliderTitle">{{$news['title']}}</p>
                                               <p href="" style="margin: 0px 12px 18px" id="articleSliderDate">
                                                {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d-m-y') }}
                                            </p>
                                           </div></a>
                     </div>
                     @endif
                       @endif
                     @endforeach
                   </div>
              
                </div>
              </div>
              
                                 <!-- slider end --> 
                <div class="team col-xs-12 ct">
                                  @foreach ($transfernews as $key=>$news)
                                 
                                  <div class="row transfer_listing" style="margin-top:15px">
                                    <div class="col-xs-6">
                                      <a href="{{$news['url']}}" style="border-radius: 9px"><img src="{{$news['urlToImage']}}" onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"alt="" style="margin-bottom: 20px; border-radius:9px" id="articleImg"></a>
                                    </div>
                                    <div class="col-xs-6">
                                      <h5 class="title-cat" id="articleTitle">{{$news['title']}}</h5>
                                     <span style="color:#B1B1B1" id="newsPortal">{{$news['name']}}</span>
                                    <p href="" style="color:#B1B1B1" id="articleDate">
                                        {{ \Carbon\Carbon::parse($news['publishedAt'])->format('D, d/m/y') }}
                                    </p>
                                    </div>
                                  </div>
                                  
                                  @endforeach
                                  <a class="btn btn-lg btn-dark w-100" id="transferLoadMore" style="color: white;margin-bottom:12px">{{ trans('lang.SHOW MORE') }}</a>
                                </div>
            </div>
            <div class="tab-pane fade p-3 in" id="videos" aria-labelledby="videoTab">
                <div class="container-videos">
                    @foreach ($videos as $key=>$video)
                    
                    <div class="video-box embed-responsive embed-responsive-16by9 video-listing">
                        <h3>{{$video['desc']}}</h3>
                        <div class="video-box-alert">
                            <img id="video" src="{{$video['image']}}" class="mb-1" alt="Icon" width="25" style="max-width: 25px;">
                        </div>
                        <iframe width="560" height="550" src="{{$video['url']}}" title="YouTube video player" frameborder="0" ></iframe>
                    </div>
                    
                    @endforeach


                    <a class="btn btn-lg btn-dark w-100" id="videoLoadMore" style="color: white; margin-bottom: 12px;">{{ trans('lang.SHOW MORE') }}</a>
                </div>
            </div>
        </div>


    </div>
    </div>
            <div class="clearfix"></div>
    <script type="text/javascript">
        var translations ={
            'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',
        };
    </script>
@include('partials.footernew')

<script src="{{ asset('assets/js/Prediction.js') }}"></script>
<script src="{{ asset('js/frontend/home.js')}}"></script>


</body>
</html>
