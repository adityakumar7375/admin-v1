@php $webData = Cache::get('web'); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{@$webData['data']['favicon']}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{@$webData['data']['favicon']}}" type="image/x-icon">
    <title>{{@$webData['data']['baseUrl']}} </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('ui')}}/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{asset('/ui')}}/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/responsive.css">

    <style>
    .parsley-required {
        color: red;
    }
    </style>
</head>


<body>


    <!-- login page start-->
    <div class="container-fluid">
        @yield('content')
    </div>






    <!-- Modal-->
    <div class="modal fade" id="loginError" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="loginError" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-body">
                    <div class="modal-toggle-wrapper">
                        <ul class="modal-img">
                            <li> <img src="{{asset('/ui')}}/assets/images/gif/danger.gif" alt="alarm"></li>
                        </ul>
                        <h4 class="text-center pb-2" id="errorLog"></h4>
                        <!-- <p class="text-center">Getting back in touch in <b class="txt-warning">14 seconds...</b></p> -->
                        <!-- <button class="btn btn-warning d-flex m-auto" type="button" data-bs-dismiss="modal">LogOut All
                            device
                        </button> -->

                        <button class="btn btn-warning d-flex m-auto" id="logout_request" onclick="RequestLogout()"
                            type="button">Logout
                            from all
                            devices ?</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- otp model -->

    <div class="modal fade" id="otp_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="loginError" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dark-sign-up overflow-hidden">
                <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">

                        <div class="modal-toggle-wrapper">
                            <ul class="modal-img">
                                <li> <img src="{{asset('/ui')}}/assets/extra/hacker.gif" alt="alarm"></li>
                            </ul>

                            <h4 class="text-dark text-center">Verify Your OTP</h4>
                            <p class="text-center">
                                Enter the 6-digit OTP sent to your mobile.</p>
                            <form action="{{ route('submit.otp') }}" method="post" class="row g-3" id="submitFormOtp">
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label" for="otp">Enter OTP</label>
                                    <input class="form-control" id="otp" name="otp" required type="number"
                                        placeholder="Enter OTP">
                                </div>

                                <div class="col-12">
                                    <p class="text-left">Getting back in touch in <b class="txt-warning">14
                                            seconds...</b></p>
                                </div>

                                <div class="col-12 text-end">

                                    <button class="btn btn-primary" type="submit" id="submit_otp">Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end model -->




    <!-- latest jquery-->
    <script src="{{asset('/ui')}}/assets/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('/ui')}}/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="{{asset('/ui')}}/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{asset('/ui')}}/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{asset('/ui')}}/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <!-- calendar js-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('/ui')}}/assets/js/script.js"></script>
    <script src="{{asset('/ui')}}/assets/js/script1.js"></script>
    <script src="{{asset('/ui')}}/extra/parsley.min.js"></script>
    <script src="{{asset('/ui')}}/extra/iziToast.min.js"></script>
    <script src="{{asset('/ui')}}/extra/tsparticles.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('form').parsley();
    });


    $("#submitForm").on('submit', function(e) {
        e.preventDefault();
        var data = new FormData(this);
        if ($(this).parsley().isValid()) {
            $('#btnSubmit').prop('disabled', true);
            $("#btnSubmit").html("Please wait.. <i class='fa fa-spin fa-refresh '></i>");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#btnSubmit').prop('disabled', false);
                    $("#btnSubmit").html("Submit");
                    if (response.error == true) {
                        iziToast.show({
                            icon: response.icon,
                            color: response.color,
                            message: response.msg,
                            position: 'topCenter',
                        });
                    }

                    if (response.model == 'open') {
                        $("#errorLog").html(response.msg);
                        var modal = new bootstrap.Modal(document.getElementById('loginError'));
                        modal.show();
                    }
                    if (response.model == 'close') {
                        var modal = new bootstrap.Modal(document.getElementById('loginError'));
                        modal.hide();
                    }
                    if (response.otp == 'open') {

                        var modal1 = new bootstrap.Modal(document.getElementById('otp_model'));
                        modal1.show();
                    }
                    if (response.otp == 'close') {
                        var modal1 = new bootstrap.Modal(document.getElementById('otp_model'));
                        modal1.hide();
                    }


                    if (response.reditect == true) {
                        if (response.wayOfRedirect == 'reload') {
                            window.setTimeout(function() {
                                window.location.reload();
                            }, 800);
                        } else if (response.wayOfRedirect == 'redirect') {
                            window.setTimeout(function() {
                                window.location.href = response.location;
                            }, 800);
                        }
                    }
                },
                error: function() {
                    //alert('errorData');
                    $("#submitBtn").removeAttr("disabled");
                    $("#buttonText").html("Login <i class='fa fa-sign-in'></i>");
                }
            });

        } else {
            return false;
        }
    });


    // otp mobule
    </script>
    </div>
</body>

</html>