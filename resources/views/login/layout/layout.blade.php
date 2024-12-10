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

    <link rel="icon" href="{{Cache::get('img_url').'/'.$webData['data']['favicon']}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{Cache::get('img_url').'/'.$webData['data']['favicon']}}" type="image/x-icon">
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
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/loader.css">
    <script>
    if (localStorage.getItem("agent") == "" || localStorage.getItem("agent") == null) {
        const userAgent = navigator.userAgent;
        var agentValue = getAgentName(userAgent);
        localStorage.setItem("agent", agentValue);
    } else {
        console.log("Agent found in localStorage:", localStorage.getItem("agent"));
    }

    // end

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                //localStorage.setItem(cacheKey, JSON.stringify(response));
                localStorage.setItem('lat', lat);
                localStorage.setItem('lng', lng);
                // set lat - long

                fetch('/save-location', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            latitude: lat,
                            longitude: lng,
                            agent: localStorage.getItem("agent")
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Location saved:', data);
                    })
                    .catch(error => {
                        // console.error('Error saving location:', error);
                    });

            },
            function(error) {

                alert('Please enable location access in your browser settings to proceed.');
            }
        );
    } else {
        alert('Geolocation is not supported by your browser.');
    }
    localStorage.setItem("base_url", "{{@$webData['data']['baseUrl']}}");

    // user ajent
    function getAgentName(agentName) {
        let browserName = 'Unknown';
        let version = '';

        const browsers = {
            'Firefox': /Firefox\/([0-9\.]+)/,
            'Brave': /Brave\/([0-9\.]+)/,
            'Edge': /Edg\/([0-9\.]+)/,
            'Chrome': /Chrome\/([0-9\.]+)/,
            'Safari': /Safari\/([0-9\.]+)/,
            'IE': /MSIE ([0-9\.]+);/,
            'Postman': /PostmanRuntime\/([0-9\.]+)/
        };

        for (let name in browsers) {
            const regex = browsers[name];
            const matches = agentName.match(regex);

            if (matches) {
                browserName = name;
                version = matches[1] || ''; // Extract version number
                break;
            }
        }

        return browserName + version;
    }
    </script>
    <style>
    .parsley-required {
        color: red;
    }
    </style>
</head>

<body>

    <div class="waiting" style="display:none">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner-1"></div>
        </div>
    </div>
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

                            <form action="/admin/access/allLogout" method="post" class="row g-3" id="submitFormOtp">

                                <div class="col-md-12">
                                    <label class="form-label" for="otp">Enter OTP</label>
                                    <input class="form-control" id="otp" name="otp" required type="number"
                                        placeholder="Enter OTP">
                                </div>

                                <div class="col-12">
                                    <p class="text-left" id="timer"></p>
                                    <p id="resendbtn" style="display:none"><a href='return:false' onclick='resendOtp()'>Resend OTP</a></p>
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
    <!-- <script src="{{asset('/ui')}}/extra/tsparticles.bundle.min.js"></script> -->
    <script>
    $(document).ready(function() {
        $('form').parsley();
    });





    let timerInterval;
    let countdown = 60;
    function startTimer() {
        timerInterval = setInterval(function() {
            countdown--;
            document.getElementById("timer").textContent = `Resend OTP in: ${countdown} Seconds`;
            if (countdown <= 0) {
                clearInterval(timerInterval);
                $("#timer").hide();
                $("#resendbtn").show();
            }
        }, 1000);
    }

    function resendOtp() {
        countdown = 60;
        startTimer();
        $("#timer").show();
        $("#resendbtn").hide();
        RequestOTP();
    }





     function RequestOTP() {

        const base_url = localStorage.getItem('base_url');
        const url = base_url + '/admin/access/resendOtp';
        var sendData = {};
        sendData['latitude'] = localStorage.getItem('lat');
        sendData['longitude'] = localStorage.getItem('lng');
        sendData['token'] = localStorage.getItem('otp_token');
        sendData['agent'] = localStorage.getItem('agent');
        console.log(sendData);
        const response = SendServerRequest(url, sendData);

    }












    function getLocationAndStore(callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                // Store the lat and lng in localStorage
                localStorage.setItem('lat', lat);
                localStorage.setItem('lng', lng);
                fetch('/save-location', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            latitude: lat,
                            longitude: lng,
                            agent: localStorage.getItem("agent")
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Location saved:', data);
                    })
                    .catch(error => {
                        // console.error('Error saving location:', error);
                    });
                callback(true);
            }, function(error) {
                if (error.code === error.PERMISSION_DENIED) {
                    alert(
                        "Location permission denied. Please enable location access in your browser settings to proceed."
                    );
                } else if (error.code === error.POSITION_UNAVAILABLE) {
                    alert("Location information is unavailable. Try again later.");
                } else if (error.code === error.TIMEOUT) {
                    alert("The request to get user location timed out.");
                } else {
                    alert("An unknown error occurred.");
                }
                callback(false);
                // alert("Location access denied or failed.");
            });
        } else {
            alert("Geolocation is not supported by this browser.");
            callback(false);
        }
    }

    $("#submitForm").on('submit', function(e) {
        if (localStorage.getItem('lat') == null || localStorage.getItem('lng') == null) {
            alert('Please enable location access in your browser settings to proceed.');
            getLocationAndStore(function(isLocationAvailable) {
                if (isLocationAvailable) {
                    $(".waiting").show();
                    const base_url = localStorage.getItem('base_url');
                    const url = base_url + "/admin/access/login";
                    e.preventDefault();
                    var data = new FormData(this);
                    var sendData = {};
                    data.forEach(function(value, key) {
                        sendData[key] = value;
                    });
                    sendData['latitude'] = localStorage.getItem('lat');
                    sendData['longitude'] = localStorage.getItem('lng');
                    sendData['agent'] = localStorage.getItem('agent');

                    const response = SendServerRequest(url, sendData);
                } else {
                    alert('Please enable location access to proceed with the form submission.');
                }
            });
        } else {
            $(".waiting").show();
            const base_url = localStorage.getItem('base_url');
            const url = base_url + "/admin/access/login";
            e.preventDefault();
            var data = new FormData(this);
            var sendData = {};
            data.forEach(function(value, key) {
                sendData[key] = value;
            });
            sendData['latitude'] = localStorage.getItem('lat');
            sendData['longitude'] = localStorage.getItem('lng');
            sendData['agent'] = localStorage.getItem('agent');
            const response = SendServerRequest(url, sendData);
        }
    });

    // otp mobule


    $("#submitFormOtp").on('submit', function(e) {
        const base_url = localStorage.getItem('base_url');
        const loginType = localStorage.getItem('typeLogin');
        if (loginType == 'all_logout') {
            var endpoint = $(this).attr('action');
        } else {
            var endpoint = "/admin/access/loginCheckToken";
        }
        const url = base_url + endpoint;
        console.log(url);
        e.preventDefault();
        var data = new FormData(this);
        var sendData = {};
        data.forEach(function(value, key) {
            sendData[key] = value;
        });
        
        sendData['latitude'] = localStorage.getItem('lat');
        sendData['longitude'] = localStorage.getItem('lng');
        sendData['token'] = localStorage.getItem('otp_token');
        sendData['mobile'] = $("#mobile_data").val();
        sendData['agent'] = localStorage.getItem('agent');
        const response = SendServerRequest(url, sendData);
    });

    // RequestLogout logout_request
    function RequestLogout() {
        $(".waiting").show();
        const base_url = localStorage.getItem('base_url');
        const url = base_url + '/admin/access/reqAllLogout';
        var sendData = {};
        sendData['latitude'] = localStorage.getItem('lat');
        sendData['longitude'] = localStorage.getItem('lng');
        sendData['mobile'] = $("#mobile_data").val();
        sendData['agent'] = localStorage.getItem('agent');
        const response = SendServerRequest(url, sendData);

    }

    // error code

    function processResponse(data) {
        $(".waiting").hide();
        console.log(data);
        const msg = data.message;
        document.getElementById('submitFormOtp').reset();
        if (data.errorCode == 200) {
            // set data
            if(data.data.type=='resend_otp'){
                localStorage.setItem('otp_token', data.data.token);
                localStorage.setItem('typeLogin', data.data.type);
            }else{
                localStorage.setItem('user', JSON.stringify(data.data));
                localStorage.setItem('token', data.data.userToken);
                // tost message
                const msg = data.message;
                iziToast.show({
                    icon: 'fa fa-check',
                    color: 'green',
                    message: msg,
                    position: 'topCenter',
                });
                // hide old model
                $("#otp_model").modal('hide');
                // otp model open
                if (data.data.userId !== null && data.data.userId !== undefined && data.data.userId !== "") {
                    window.setTimeout(function() {
                        window.location.href = 'setSession/' + btoa(JSON.stringify(data));
                    }, 800);
                }

            }


        }
        if (data.errorCode == 202) {
            // set token
            localStorage.setItem('otp_token', data.data.token);
            localStorage.setItem('typeLogin', data.data.type);
            // tost message
            const msg = data.message;
            iziToast.show({
                icon: 'fa fa-check',
                color: 'green',
                message: msg,
                position: 'topCenter',
            });
            // hide old model
            $("#loginError").modal('hide');
            // otp model open
            var modal = new bootstrap.Modal(document.getElementById('otp_model'));
            modal.show();
            startTimer();
        }
        if (data.errorCode == 404) {
            const msg = data.message;
            iziToast.show({
                icon: 'fa fa-check',
                color: 'red',
                message: msg,
                position: 'topCenter',
            });
        }
        if (data.errorCode == 301) {
            const msg = data.message;
            $("#errorLog").html(msg);
            var modal = new bootstrap.Modal(document.getElementById('loginError'));
            modal.show();
            iziToast.show({
                icon: 'fa fa-check',
                color: 'red',
                message: msg,
                position: 'topCenter',
            });
        }
        if (data.errorCode == 419) {

        }
        if (data.errorCode == 303) {

        }
        if (data.errorCode == 400) {
            iziToast.show({
                icon: 'fa fa-check',
                color: 'red',
                message: msg,
                position: 'topCenter',
            });
        }
    }



    // send server request

    function SendServerRequest(url, data) {
        console.log(data);
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function(response) {
                // console.log(response);
                processResponse(response);
            },
            error: function() {
                iziToast.show({
                    icon: 'fa fa-check',
                    color: 'red',
                    message: 'Server Error 500',
                    position: 'topCenter',
                });
            }
        });
    }
    </script>
</body>

</html>