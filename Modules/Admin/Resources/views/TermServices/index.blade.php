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
                            <textarea class="form-control" name="summernote" id="summernote">
                                <h3 style="text-align: center">Terms and Conditions</h3>
                                
                               <p style="text-align: start;"><span style="font-weight: 700;">Please read these terms and conditions carefully before using Our Service</span></p>

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