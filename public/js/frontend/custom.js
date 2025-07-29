


$(document).ready(function() {

    var baseurl=window.location.origin;

   
    

    function LeagueSearchDisplay(start_date,end_date,type,league_id)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/MatchesListByLeague",
            data : {   league_id : league_id,
                       start_date : start_date,
                       end_date : end_date,
                       type : type
                   },
            success: function (response)
            {
                if (response.success == 1)
                {
                    alert("matche found");
                }
                else if(response.success == 0)
                {
                    alert("matche not found");
                }
            }
        });
    }

    $(document).on("click", "#msisdnSingUpBtn", function(e){
        e.preventDefault();

        var msisdn = $('#msisdn').val();

        var check = $("#checkboxID").is(":checked");

        if(msisdn == '')
        {
            $('#errorMsg').html('');
            $('#errorMsg').append('Please enter Msisdn');
            $("#msisdn").css("border-color", 'red');
        }
        else
        {
            if(check == false)
            {
                $('#checkboxErr').html('');
                $('#checkboxErr').append('You have to allow all terms and condition.');
            }
            else
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/otpgenerate",
                    data : {   msisdn : msisdn
                           },
                    success: function (response) 
                    {
                        if (response.success == 1) 
                        {
                            alert('Your OTP is : ' +  response.otp);
                            var get_msisdn = response.msisdn;
                            window.location.href=window.location.origin+"/otpSubmit/" + get_msisdn;
                        }
                        else if(response.success == 0)
                        {
                            swal(response.massage, "Some data are missing!",  "error")
                            .then((value) => {
                                location.reload();
                            });
                        }
                    }
                });
            }  
        }

    });

    $(document).on("click", "#otpVarifyBtn", function(e){
        e.preventDefault();

        var msisdn = $('input#hidden_msisdn').val();
        var otp = $('#otp').val();

        if(otp == '')
        {
            $('#errorMsgOtp').html('');
            $('#errorMsgOtp').append('Please enter OTP');
            $("#otp").css("border-color", 'red');
        }
        else
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type : "POST",
                dataType : "json",
                url : baseurl + "/otpVerify",
                data : {   msisdn : msisdn , otp : otp
                       },
                success: function (response) 
                {
                    if (response.success == 1) 
                    {
                        swal(response.massage, "User registered successfully.",  "success")
                        .then((value) => {
                            window.location.href=window.location.origin+"/login";
                        });
                    }
                    else if(response.success == 0)
                    {
                        swal(response.massage, "Some data are missing!",  "error")
                        .then((value) => {
                            location.reload();
                        });
                    }
                }
            });  
        }
        
    });

});

