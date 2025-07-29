var baseurl=window.location.origin;

//set Time-Zone in Cookie(19.05.2022)
const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
document.cookie='fcookie='+tz;

$(document).ready(function() {
    var baseurl=window.location.origin;



    function redirectToNews(newsType) {
        var form = $('<form>', {
            'action': baseurl + '/news',
            'method': 'GET'
        });

        $('<input>', {
            'type': 'hidden',
            'name': 'newsType',
            'value': newsType
        }).appendTo(form);

        form.appendTo('body').submit();
    }

    $('.seeAllLink').on('click', function () {
        var newsType = $(this).attr('data-newsType');
        redirectToNews(newsType);
    });



     GetMatches();

    

    function GetMatches()
    {

            var start_date;
            var end_date;
            var type;
             var date = new Date();

        var team_type = $(".team_active").attr('data-href');

       var leauge_id = $( "#league_id_list" ).val();
       var date_type = $(".date_active").attr('data-type');

     
         start_date = new Date(date.getTime() + 24 * 60 * 60 * 1000).toISOString().slice(0, 10);
         end_date = new Date(date.getTime() + 48 * 60 * 60 * 1000).toISOString().slice(0, 10);
         type = "tomorrow";
     


       





       // alert(team_type);
        $(".matches").hide();

  $('#skloader2').show();

  var leaguearray = {'0': leauge_id};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/getmatches",
            data : {  start_date : start_date,
                      end_date : end_date,
                      type : type,
                      team_type:team_type,
                      league:leauge_id
                   },
            success: function (response)
            {
                console.log(response);
                if (response.success == 1)
                {
                    var game_html = '';

                    if (response.matches.length != 0)
                    {
                        $.each(response.matches,function(index,data){

                            
                                var matche_status = "Finished";
                                var background ="background-color:red";

                           
                            var date_time = data['date_time'];
                            var localTime  = moment.utc(date_time).toDate();
                            // var localDateTime = moment(localTime).format('YYYY-MM-DD HH:mm:ss'); //with second
                            var localDateTime = moment(localTime).format('YYYY-MM-DD HH:mm');

                            matche_status = data['match_status'];

                             if(matche_status == "Finished"){
                            
                           background ="background-color:red";
                        }else{
                            background ="background-color:#7CD327";
                           
                        }

                            game_html +='<div class="matches">'+
                                            '<div class="d-flex j-center">'+
                                                '<div class="club-left mx-1 text-center">'+
                                                    '<a href="'+baseurl+'/team/details/'+data['homeTeam_id']+'">'+
                                                        '<div class="logo">'+
                                                            '<img src="'+data['homeTeam_image']+'" alt="">'+
                                                        '</div>'+
                                                    '</a>'+
                                                    '<h5 class="mb-0">'+data['homeTeam_name']+'</h5>'+
                                                '</div>'+
                                                '<div class="mid mx-2 d-flex flex-column my-auto">'+
                                                    '<div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">'+
                                                        '<span>'+data['localteam_score']+'</span>'+
                                                        '<span class="mx-2 border-right"></span>'+
                                                        '<span>'+data['visitorteam_score']+'</span>'+
                                                    '</div>'+
                                                    '<span class="my-1">'+localDateTime+'</span>'+
                                                    '<a href="'+baseurl+'/match/details/'+data['fixture_id']+'">'+
                                                        '<span class="btn-pill" id="matche_status_id" style="padding: 1px 16px;border-radius: 15px;color: white;'+background+'">'+matche_status+'</span>'+
                                                    '</a>'+
                                                '</div>'+
                                                '<div class="club-right mx-1 text-center">'+
                                                    '<a href="'+baseurl+'/team/details/'+data['awayTeam_id']+'">'+
                                                        '<div class="logo">'+
                                                            '<img src="'+data['awayTeam_image']+'" alt="">'+
                                                        '</div>'+
                                                    '</a>'+
                                                    '<h5 class="mb-0">'+data['awayTeam_name']+'</h5>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>';

                        });
                        $('#skloader2').hide();
                        
                        $('div#matchDisplay').html('');
                        $('div#matchDisplay').html(game_html);


                    }
                    else
                    {

                         $('#skloader2').hide();
                        $('div#matchDisplay').html('<div align="center"><b>No Data Found</b></div>');
                    }
                }
                else if(response.success == 0)
                {
                     $('#skloader2').hide();
                    $('div#matchDisplay').html('');
                    $('div#matchDisplay').html('<div align="center"><b>No Data Found</b></div>');
                }
            }
        });
    }
        
    var session = $("#session").val();

    if (session == "") {
        $('#howToPlay').modal({
            backdrop: false,  // Prevent clicking outside the modal to close it
            keyboard: false    // Prevent using the keyboard to close the modal
        });
        console.log("here");
        // Show the modal
        $('#howToPlay').modal('show');

        // Handle the modal's show event
        $('#howToPlay').on('show.bs.modal', function () {
            // Add a class to the body to disable scrolling
            $('body').addClass('modal-open');
        });

        // Handle the modal's hidden event
        $('#howToPlay').on('hidden.bs.modal', function () {
            // Remove the class to enable scrolling when the modal is hidden
            $('body').removeClass('modal-open');
        });

        $('.next-slide').on('click', function () {
            // Get the current step index
            var currentIndex = parseInt($(this).data('step'));

            // Hide the current item
            $('.intro-slider-item').eq(currentIndex).hide();

            // Show the next item
            currentIndex += 1;
            $('.intro-slider-item').eq(currentIndex).show();
        });
    }








});

