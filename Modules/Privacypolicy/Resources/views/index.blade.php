@extends('admin.layout.admin_template')

@section('admin_content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Summernote Editor Example</title>
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form method=”POST” action="">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control"  name="summernote" id="summernote">
                                <h3 style="text-align: center">Privacy Notice</h3>
                                <p style="text-align: start;">This privacy notice discloses the privacy practices for&nbsp; This privacy notice applies solely to information collected by this website. It will notify you of the following:.</p>
                               <li>What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.</li><li>What choices are available to you regarding the use of your data.</li><li>The security procedures in place to protect the misuse of your information.</li><li>How you can correct any inaccuracies in the information.</li>

                               <p style="text-align: start;"><span style="font-weight: 700;">Information Collection, Use, and Sharing</span>&nbsp;<br>We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.</p>

                               <p style="text-align: start;">We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.</p>

                               <p style="text-align: start;">Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.</p>

                               <p style="text-align: start;"><span style="font-weight: 700;">Your Access to and Control Over Information</span>&nbsp;<br>You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:</p>

                               <li>See what data we have about you, if any.</li><li>Change/correct any data we have about you.</li><li>Have us delete any data we have about you.</li><li>Express any concern you have about our use of your data.</li>

                               <p style="text-align: start;"><span style="font-weight: 700;">Security</span>&nbsp;<br>We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.</p>

                               <p style="text-align: start;">Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for "https" at the beginning of the address of the Web page.</p>

                               <p style="text-align: start;">While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment..</p>

                               <span style="font-weight: 700;">If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at&nbsp;<u>069 315 302</u>&nbsp;or&nbsp;<u>customer.service@linkit360.com</u>.</span>
                            </textarea>
                        </div>
                        <button type=”submit” class="btn btn-danger btn-block">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
</html>
@endsection
