<footer>
    <div class="top"id="leagueBanner" >
        <img src="{{asset('assets/img/the-logo-leagues.png')}}"  class="img-responsive" alt=""/>
    </div>
    <div class="bottom">
        <div class="text-center" id="footerLogo"><a href="/"><img src="{{asset('assets/img/logo-goaly.png')}}" height="50px" alt=""/></div></a>
      
        <div class="text-footer">
            <a href="{{route('terms')}}" id="termsAndConditions">Term of Conditions</a> <a href="{{route('policyy')}}" id="privacyPolicy">Privacy Policy</a>  <a href="https://linkit360.com/contact-us/" id="contactUs">Contact Us</a>
        </div>
        <div class="copyright" id="copyRight">@2019. Goaly. All Right Reserved.</div>
    </div>
</footer>

    <input type="hidden" id="session" name="session" value="{{ !empty(Session('User')['status'])?Session('User')['status']:'' }}">
    
<script>
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/firebase-messaging-sw.js')
    .then(function(registration) {
      console.log('✅ Service Worker registered with scope:', registration.scope);
    }).catch(function(err) {
      console.error('❌ Service Worker registration failed:', err);
    });
}
</script>

   

    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <script src="https://unpkg.com/ionicons@4.2.4/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://www.youtube.com/s/player/f93a7034/www-widgetapi.vflset/www-widgetapi.js"></script> -->

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- to hide goaly loader -->

<script type="text/javascript">
    
    function unsubscribe(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to unsubscribe?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, unsubscribe!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: base_url + '/unsubscribe',
                    method: 'POST',
                    success: function(response) {
                        if (response.msg) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.msg,
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function() {
                                window.location.href = base_url + '/logout';  
                            });
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Network error';
                        if (xhr.status === 404) {
                            errorMsg = 'Please login to unsubscribe.';
                        } else if (xhr.status === 400) {
                            errorMsg = 'Network error during the unsubscribe process.';
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: errorMsg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });
            }
        });
    }



    $(document).ready(function() {
        $('#loader-logo-golay').hide();


        $('#loader-logo-golay').show();


        setTimeout(function() {
            $('#loader-logo-golay').hide();
        }, 1000); 


        var url = "{{ route('LangChange') }}";

        $("#languageDropDown").change(function() {
            var selectedLang = $(this).val();

            if (selectedLang) {
                window.location.href = url + "?lang=" + selectedLang;
            }
        });


    });
</script>
<!-- to hide goaly loader -->



<script type="text/javascript">
        //Start Youtube API
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var youtubeReady = false;

//Variable for the dynamically created youtube players
var players= new Array();
var isPlaying = false;
function onYouTubeIframeAPIReady(){
  //The id of the iframe and is the same as the videoId
  jQuery(".youtube-video").each(function(i, obj)  {
     players[obj.id] = new YT.Player(obj.id, {
              videoId: obj.id,
                playerVars: {
                controls: 2,
              rel:0,
              autohide:1,
              showinfo: 0 ,
              modestbranding: 1,
              wmode: "transparent",
              html5: 1
        },
        events: {
          'onStateChange': onPlayerStateChange
        }
       });
     });
     youtubeReady = true;
  }


function onPlayerStateChange(event) {
  var target_control =  jQuery(event.target.getIframe()).parent().parent().parent().find(".controls");

  var target_caption = jQuery(event.target.getIframe()).parent().find(".carousel-caption");
  switch(event.data){
    case -1:
      jQuery(target_control).fadeIn(500);
      jQuery(target_control).children().unbind('click');
      break
     case 0:
      jQuery(target_control).fadeIn(500);
      jQuery(target_control).children().unbind('click');
      break;
     case 1:
      jQuery(target_control).children().click(function () {return false;});
      jQuery(target_caption).fadeOut(500);
      jQuery(target_control).fadeOut(500);
       break;
      case 2:
        jQuery(target_control).fadeIn(500);
        jQuery(target_control).children().unbind('click');
        break;
        case 3:
           jQuery(target_control).children().click(function () {return false;});
           jQuery(target_caption).fadeOut(500);
           jQuery(target_control).fadeOut(500);
           break;
          case 5:
            jQuery(target_control).children().click(function () {return false;});
            jQuery(target_caption).fadeOut(500);
            jQuery(target_control).fadeOut(500);
            break;
          default:
            break;
    }
};

jQuery(window).bind('load', function(){
  jQuery(".carousel-caption").fadeIn(500);
  jQuery(".controls").fadeIn(500);
 });

jQuery('.carousel').bind('slid.bs.carousel', function (event) {
   jQuery(".controls").fadeIn(500);
});
    </script>
