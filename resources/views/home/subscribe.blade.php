@include('partials.header')
<style>
    .subscribe-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .subscribe-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .btn-subscribe {
        background-color: #28a745;
        color: white;
        font-size: 16px;
        font-weight: bold;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
    }
    .btn-subscribe:hover {
        background-color: #218838;
    }
    #subscription-container {
        display: none;
    }
</style>
</head>

<body>
<div class="">
    @include('partials.topmenubar_portal')
    <div class="clearfix"></div>
    @include('partials.sidebar_portal_new')
    <div class="page-content container-fluid">

        <div class="subscribe-container">
            <div class="subscribe-header">
                <img src="{{ asset('assets/img/logo-goaly.png') }}" height="60" alt="Goaly Logo">
                <h4 class="mt-3"><strong>Subscribe Now</strong></h4>
                <p class="text-muted">Choose a subscription plan to compete!</p>
            </div>

            <!-- MSISDN Input -->
            <div class="form-group">
                <label for="msisdn" class="font-weight-bold">Enter MSISDN:</label>
                <input type="number" class="form-control" id="msisdn-input" name="msisdn" placeholder="96XXXXXXXXXX" required>
                <small class="form-text text-muted">Please enter your 10-digit MSISDN number.</small>
            </div>

            <p id="userStatusMsg" class="text-center" style="display: none; font-weight: bold;"></p>

            <!-- Check User Status Button -->
            <button onclick="checkUserStatus()" class="btn btn-subscribe">Check Status</button>

            <!-- Subscription Options (Initially Hidden) -->
            <div id="subscription-container">
                <div class="form-group mt-3">
                    <label class="btn btn-light btn-block text-left">
                        <input type="radio" name="options" value="daily"> Daily Subscription <span class="float-right"><strong>109ks</strong>/day</span>
                    </label>
                </div>

                <div class="form-group">
                    <label class="btn btn-light btn-block text-left">
                        <input type="radio" name="options" value="weekly"> Weekly Subscription <span class="float-right"><strong>649ks</strong>/week</span>
                    </label>
                </div>

                <!-- Subscribe Button -->
                <button onclick="subscribe()" class="btn btn-subscribe">Subscribe</button>
            </div>
        </div>
    </div>
</div>

@include('partials.footernew')

<script>
    function checkUserStatus() {
        var msisdn = $('#msisdn-input').val();  

        if (!msisdn || msisdn.length < 10) {
            $('#userStatusMsg').text("Please enter a valid 10-digit MSISDN number.").css("color", "red").fadeIn();
            return;
        }

        $.ajax({
            url: '/checkUserStatus',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { msisdn: msisdn },
            success: function(response) {
                if (response.status && response.user.status === 'active') {
                    // If user is already subscribed
                    $('#userStatusMsg').text("✅ User Already Subscribed").css("color", "green").fadeIn();
                    $('#subscription-container').hide(); // Hide subscription options
                } else {
                    // If user is not subscribed, show options
                    $('#userStatusMsg').hide();
                    $('#subscription-container').fadeIn();
                }
            }
        });
    }

    function subscribe() {
        const msisdn = document.getElementById('msisdn-input').value;
        const type = document.querySelector('input[name="options"]:checked');

        if (!type) {
            $('#userStatusMsg').text("Please select a subscription plan.").css("color", "red").fadeIn();
            return;
        }

        const subscriptionType = type.value;
        const url = subscriptionType === 'daily'
            ? "http://149.129.252.221:8028/app/api/mytel/wap.php?type=reg&service=goalydaily&msisdn=" + msisdn
            : "http://149.129.252.221:8028/app/api/mytel/wap.php?type=reg&service=goalyweekly&msisdn=" + msisdn;
        
        window.location.href = url;
    }
</script>

</body>
</html>
