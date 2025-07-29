
<style>
      .fixed-con {
    z-index: 9724790009779558!important;
    background-color: #f7f8fc;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow-y: auto;
  }
  .VIpgJd-ZVi9od-aZ2wEe-wOHMyf{
   z-index: 9724790009779!important;
   top:0;
   left:unset;
   right:-5px;
   display:none!important;
   border-radius:50%;
   border:2px solid gold;
  }
  .VIpgJd-ZVi9od-aZ2wEe-OiiCO{
    width:80px;
    height:80px;
  }
  /*hide google translate link | logo | banner-frame */
  .goog-logo-link,.gskiptranslate,.goog-te-gadget span,.goog-te-banner-frame,#goog-gt-tt, .goog-te-balloon-frame,div#goog-gt-{
    display: none!important;
  }
  .goog-te-gadget {
    color: transparent!important;
    font-size:0px;
  }

  .goog-text-highlight {
    background: none !important;
    box-shadow: none !important;
  }
   
 /*google translate Dropdown */
 
 #google_translate_element select{
 background:#f6edfd;
 color:#383ffa;
 border: none;
 border-radius:3px;
 padding:6px 8px
 }
.active-style{
    font-size: 12px;
/*    margin-left: 10px;*/
    padding: 0.5em;
    background-color: #5cb85c;
    border-color: #4cae4c;
    width: 55px;
    text-align: center;
    border-radius: 11px;
    height: 18px;
    margin-top: 3px;
}
.inactive-style {
    font-size: 12px;    
    background-color: red;
    border-color: red;
    width: 55px;
    text-align: center;
    border-radius: 11px;
    height: 18px;
    margin-top: 3px;
    padding: 0.5em;
}

.button-style{
    height: 39px;
    width: 100%;
    margin-top: 15px;
    background-color: rgb(77, 6, 83);
    color: white;
    border: none;
}
.logout-style{
    background-color: #9C25A8;
    width: 92%;
    border: none;
    margin-left: 10px;
    margin-top: 10px;
    height: 39px;
}
.VIpgJd-ZVi9od-aZ2wEe-wOHMyf{
   z-index: 9724790009779!important;
   top:0;
   left:unset;
   right:-5px;
   display:none!important;
   border-radius:50%;
   border:2px solid gold;
  }
  .VIpgJd-ZVi9od-aZ2wEe-OiiCO{
    width:80px;
    height:80px;
  }
  /*hide google translate link | logo | banner-frame */
  .goog-logo-link,.gskiptranslate,.goog-te-gadget span,.goog-te-banner-frame,#goog-gt-tt, .goog-te-balloon-frame,div#goog-gt-{
    display: none!important;
  }
  .goog-te-gadget {
    color: transparent!important;
    font-size:0px;
  }

  .goog-text-highlight {
    background: none !important;
    box-shadow: none !important;
  }
   
 /*google translate Dropdown */
 
 #google_translate_element select{
 background:rgb(77, 6, 83);
 color:#fff;
 border: none;
 border-radius:3px;
 padding:3px;
 width: 122%;
 font-size: 15px;
 }
 .goog-te-banner-frame{
    display: none !important;
 }

 .VIpgJd-ZVi9od-ORHb-OEVmcd {
    visibility: hidden !important;
 }

 
 </style>

<nav class="sideNav bgImg2" style="overflow: hidden;width: 289px;">

    <div>
        <div id="sidenavmenu" style="display: block;height: 100%;width: 345px;position: fixed;z-index: 1;">
            <div class="sidenav" style="background-color: rgb(77, 6, 83); width: 289px; height: 100%; overflow-x: hidden; padding-top: 0px; text-align: initial;">

                @php
                    $UserData = Session::get('User');
                @endphp
                
            <div class="sidenav-header block" style="background-color: #9c25a8;padding: 1em;">
              
                <div style="display: flex; align-items: center;">
                    <img src="{{ isset($UserData['img']) && File::exists(public_path('uploads/' . $UserData['img'])) ? asset('uploads/' . $UserData['img']) : asset('assets/img/account.png') }}" alt="" id="photoProfile" style="width: 80px;border-radius: 50%;height: 62px;">

                <div class="my-1 text-white" style="margin-left: 17px;margin-top:10px">
                    @if (!isset($UserData)) 
                        <span class="d-block" style="font-size: 17px;margin-top: 9px;font-weight: bold;">Demo Goaly</span>
                    @else
                    <span id="name" class="d-block" style="font-size: 17px;font-weight:bold">{{ $UserData['first_name'] ?? ' ' }} {{ $UserData['last_name'] ?? ' ' }}</span>
                  <div  >
                    <span id="phoneNumber" class="d-block" style="font-size: 17px;">{{ $UserData['msisdn'] ?? ' ' }}</span>                
                    <span  id="userStatus" class="{{ $UserData['status'] == 'active' ? 'active-style' : 'inactive-style' }}">
                            {{ ucfirst($UserData['status']) }} <!-- Capitalize first letter -->
                    </span>
                    </div>
                    @endif
                </div>

                
            </div>     
                   
           
               @if(!isset($UserData['status']) || $UserData['status'] == 'inactive')
                <!-- <button class="button-style item-link close-panel item-content"  style=""id="subscribeBtn"
                data-toggle="modal" data-target="#subscribeModal"><b>Subscribe</b></button> -->
                <a href="{{route('subscribe')}}">
                <button class="button-style item-link close-panel item-content"  style="">
                    <b>Subscribe</b></button>
                </a>
                @else
                     <button class="button-style" onclick="unsubscribe(event)"id="unsubscribeBtn"><b>Unsubscribe</b></button>
                @endif
            </div>
                
            <ul class="my-2" style="padding: 0;">
                <span class="sidebar-menu" id="menuTitle">{{ trans('lang.Menu') }}</span>

                @unless($UserData)
                    <li>
                        <a href="{{ route('logined') }}" id="loginMenu">
                            <img src="{{ asset('assets/img/login.png') }}" alt="" id="loginIcn">{{ trans('lang.Login') }}
                        </a>
                    </li>
                @endunless

                <li>
                    <a href="javascript:void(0)" class="isLogin" id="profileMenu" data-target="/profile">
                        <img src="{{ asset('assets/img/icon_account.svg') }}" alt="" id="profileIcnSidebar">{{ trans('lang.Profile') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('contest') }}" id="contestMenu">
                        <img src="{{ asset('assets/img/contest.png') }}" alt="" id="contestIcnSidebar">{{ trans('lang.Contest') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('leaderboard') }}" id="leaderboardMenu">
                        <img src="{{ asset('assets/img/leaderboard.png') }}" alt="" id="leaderboardIcn">{{ trans('lang.Leaderboard') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('getwinnerboard') }}" id="winnerMenu">
                        <img src="{{ asset('assets/img/winners.png') }}" alt="" id="winnerIcn">{{ trans('lang.Winners') }}
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)" class="isLogin" id="contestHistoryMenu" data-target="/contests/history">
                        <img src="{{ asset('assets/img/icon_history.svg') }}" alt="" id="contestHistoryIcn">
                        {{ trans('lang.Contest History') }}
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: flex;">
                        <img src="{{ asset('assets/img/language.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;" id="languageIcn">
                        Language
                        <select class="langDropDown" id="languageDropDown">
                        <option value="">Select</option>

                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="my" {{ session()->get('locale') == 'my' ? 'selected' : '' }}>Myanmar</option>
                        <option value="id" {{ session()->get('locale') == 'id' ? 'selected' : '' }}>Indonesian</option>
                        <!-- <option value="ms" {{ session()->get('locale') == 'ms' ? 'selected' : '' }}>Malay</option> -->
                        <option value="nl" {{ session()->get('locale') == 'nl' ? 'selected' : '' }}>Dutch</option>
                        <option value="km" {{ session()->get('locale') == 'km' ? 'selected' : '' }}>Khmer</option>
                        <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Spanish</option>
                        <!-- <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option> -->
                        </select>

                    </a>
                </li>

                <li>
                    <a href="{{ route('faq-view') }}" id="faqMenu">
                        <img src="{{ asset('assets/img/faq.png') }}" alt="" id="faqIcn">{{ trans('lang.Faq') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('policyy') }}" id="privacyPolicyMenu">
                        <img src="{{ asset('assets/img/privacypolicy.png') }}" alt="" id="privacyPolicyIcn">{{ trans('lang.Privacy Policy') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('terms') }}" id="termsOfServiceMenu">
                        <img src="{{ asset('assets/img/term.png') }}" alt="" id="termsOfServiceIcn">{{ trans('lang.Terms & Conditions') }}
                    </a>
                </li>
            </ul>

            @if ($UserData)
                <button class="logout-style">
                    <a href="{{ route('logout') }}" id="logoutMenu"style="font-size:14px;color:white;padding:0px;font-weight: 500;">
                        {{ trans('lang.Logout') }}
                    </a>
                </button>
            @endif

      

            </div>
        </div>
    </div>
</nav>
 <script type="text/javascript">

// function googleTranslateElementInit() {
//     new google.translate.TranslateElement({
//         pageLanguage: 'en',
//         autoDisplay: 'true',
//         includedLanguages: 'en,my,id,ms,nl,km,es,ar', // Include the desired language codes here
//         layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
//     }, 'google_translate_element');
// } 


    // Prevent closing the sideNav when clicking inside the Google Translate dropdown
    $('#languageDropDown').on('click', function (e) {
        e.stopPropagation();
    });
$(document).on('change', '#languageDropDown', function () {
   
    $('.sideNav').removeClass('open');
    $('.sideNavR').removeClass('open');
});

   

</script> 