function setLocal2TimeZone()
{

 var base_url = window.location.origin;
 




var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;


     $.ajax({
            url:base_url+'/set-timezone?timezone='+timezone,
            method:'GET',
            success: function(responseMatches){

               
                  
            }
        });
}

$(document).ready(function(){

    setLocal2TimeZone();

    });