@php $webData = Cache::get('web'); $datalogin = json_decode(Cache::get('data')); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=".">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="icon" href="{{@$webData['data']['favicon']}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{@$webData['data']['favicon']}}" type="image/x-icon">
    <title>{{@$webData['data']['baseUrl']}} </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/datatables.css">

    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/echart.css">
    <!-- Plugins css Ends-->

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{asset('/ui')}}/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/responsive.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <div class="loader-wrapper">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner-1"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper StartMy Currencies-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-header row">
            <div class="header-logo-wrapper col-auto">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                            src="{{asset('/ui')}}/assets/images/logo/logo.png" alt="" /><img class="img-fluid for-dark"
                            src="{{asset('/ui')}}/assets/images/logo/logo_light.png" alt="" /></a></div>
            </div>
            <div class="col-4 col-xl-4 page-title">
                <h4 class="f-w-700">{{$webData['data']['companyName']}}</h4>
            </div>
            <!-- Page Header Start-->
            <div class="header-wrapper col m-0">
                <div class="row">
                    <form class="form-inline search-full col" action="#" method="get">
                        <div class="form-group w-100">
                            <div class="Typeahead Typeahead--twitterUsers">
                                <div class="u-posRelative">
                                    <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                        placeholder="Search Mofi .." name="q" title="" autofocus>
                                    <div class="spinner-border Typeahead-spinner" role="status"><span
                                            class="sr-only">Loading...</span></div><i class="close-search"
                                        data-feather="x"></i>
                                </div>
                                <div class="Typeahead-menu"></div>
                            </div>
                        </div>
                    </form>
                    <div class="header-logo-wrapper col-auto p-0">
                        <div class="logo-wrapper"><a href="index"><img class="img-fluid"
                                    src="{{asset('/ui')}}/assets/images/logo/logo.png" alt=""></a></div>
                        <div class="toggle-sidebar">
                            <svg class="stroke-icon sidebar-toggle status_toggle middle">
                                <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#toggle-icon"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="nav-right col-xxl-8 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                        <ul class="nav-menus">
                            <!-- <li> <span class="header-search">
                                    <svg>
                                        <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#search"></use>
                                    </svg></span></li> -->

                            <li>
                                <div class="form-group w-100">
                                    <div class="Typeahead Typeahead--twitterUsers">
                                        <div class="u-posRelative d-flex align-items-center">
                                            <svg class="search-bg svg-color">
                                                <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#search"></use>
                                            </svg>
                                            <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100"
                                                type="text" placeholder="Search Mofi .." name="q" title="">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="fullscreen-body"> <span>
                                    <svg id="maximize-screen">
                                        <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#full-screen"></use>
                                    </svg></span></li>
                            <li class="onhover-dropdown">
                                <div class="notification-box">
                                    <svg>
                                        <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#notification"></use>
                                    </svg><span class="badge rounded-pill badge-primary">4 </span>
                                </div>
                                <div class="onhover-show-div notification-dropdown">
                                    <h5 class="f-18 f-w-600 mb-0 dropdown-title">Notifications </h5>
                                    <ul class="notification-box">
                                        <li class="toast default-show-toast align-items-center border-0 fade show"
                                            aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                            <div class="d-flex justify-content-between">
                                                <div class="toast-body d-flex p-0">
                                                    <div class="flex-shrink-0 bg-light-primary"><img class="w-auto"
                                                            src="{{asset('/ui')}}/assets/images/dashboard/icon/wallet.png"
                                                            alt="Wallet"></div>
                                                    <div class="flex-grow-1"> <a href="private-chat.html">
                                                            <h6 class="m-0">Daily offer added</h6>
                                                        </a>
                                                        <p class="m-0">User-only offer added</p>
                                                    </div>
                                                </div>
                                                <button class="btn-close btn-close-white shadow-none" type="button"
                                                    data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li>
                                <div class="mode">
                                    <svg>
                                        <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#moon"></use>
                                    </svg>
                                </div>
                            </li>
                            <li class="onhover-dropdown">
                                <div class="notification-box">
                                    <svg>
                                        <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#header-message"></use>
                                    </svg><span class="badge rounded-pill badge-info">3 </span>
                                </div>
                                <div class="onhover-show-div notification-dropdown">
                                    <h5 class="f-18 f-w-600 mb-0 dropdown-title">Messages </h5>
                                    <ul class="messages">
                                        <li class="d-flex b-light1-primary gap-2">
                                            <div class="flex-shrink-0"><img
                                                    src="{{asset('/ui')}}/assets/images/dashboard-2/user/1.png"
                                                    alt="Graph"></div>
                                            <div class="flex-grow-1"> <a href="private-chat.html">
                                                    <h6 class="font-primary f-w-600">Hackett Yessenia</h6>
                                                </a>
                                                <p>Hello Miss...&#128522;</p>
                                            </div><span>2 hours</span>
                                        </li>

                                        <li class="bg-transparent"><a class="f-w-700 btn btn-primary w-100"
                                                href="letter-box.html">View all</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="profile-nav onhover-dropdown px-0 py-0">
                                <div class="d-flex profile-media align-items-center"><img class="img-30"
                                        src="{{asset('/ui')}}/assets/images/dashboard/profile.png" alt="">
                                    <div class="flex-grow-1"><span>{{$datalogin->data->userName}}</span>
                                        <p class="mb-0 font-outfit">{{$datalogin->data->userId}}<i
                                                class="fa fa-angle-down"></i></p>
                                    </div>
                                </div>
                                <ul class="profile-dropdown onhover-show-div">
                                    <li><a href="private-chat"><i data-feather="user"></i><span>Account </span></a>
                                    </li>
                                    <!-- <li><a href="letter-box.html"><i data-feather="mail"></i><span>Inbox</span></a></li>
                                    <li><a href="task.html"><i data-feather="file-text"></i><span>Taskboard</span></a>
                                    </li> -->
                                    <li><a href="edit-profile"><i data-feather="settings"></i><span>Settings</span></a>
                                    </li>
                                    <li><a href="return:false" onclick="LogOut()"><i data-feather="log-in">
                                            </i><span>Log out</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- <script class="result-template" type="text/x-handlebars-template">
                        <div class="ProfileCard u-cf">                        
              <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
              <div class="ProfileCard-details">
              <div class="ProfileCard-realName">Admin</div>
              </div>
              </div>
            </script> -->
                    <!-- <script class="empty-template" type="text/x-handlebars-template">
                        <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
                    </script> -->
                </div>
            </div>
            <!-- Page Header Ends                              -->
        </div>
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper" data-layout="stroke-svg">
                <div>
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                                src="{{@$webData['data']['logoImage']}}" alt=""></a>
                        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                        <div class="toggle-sidebar">
                            <svg class="stroke-icon sidebar-toggle status_toggle middle">
                                <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#toggle-icon"></use>
                            </svg>
                            <svg class="fill-icon sidebar-toggle status_toggle middle">
                                <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#fill-toggle-icon"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper"><a href="index"><img class="img-fluid"
                                src="{{asset('/ui')}}/assets/images/logo/logo-icon.png" alt=""></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="sidebar-menu">

                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                            src="{{asset('ui')}}/assets/images/logo/logo-icon.png" alt=""></a>
                                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <li class="pin-title sidebar-main-title">
                                    <div>
                                        <h6>Pinned</h6>
                                    </div>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6 class="lan-1">General</h6>
                                    </div>
                                </li>

                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title link-nav" href="{{route('dashboard')}}">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#stroke-file"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#fill-file"></use>
                                        </svg><span>Dashboard</span></a></li>




                                <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-widget"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-widget"></use>
                                        </svg><span class="lan-6">User Management</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">Create User</a></li>
                                        <li><a href="#">User List</a></li>
                                        <li><a href="#">User Sessions List</a></li>
                                        <li><a href="#">User Kyc Approval List</a></li>
                                        <li><a href="#">User Bulk Action</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-layout"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-layout"></use>
                                        </svg><span class="lan-7">Recharge & Bill Payment</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">API List</a></li>
                                        <li><a href="#">API Operators</a></li>
                                        <li><a href="#">User Based API Switching</a></li>
                                        <li><a href="#">Amount Wise API Switching</a></li>
                                        <li><a href="#">Amount Range Wise API Switching</a></li>
                                        <li><a href="#">Circle Based API Switching</a></li>
                                        <li><a href="#">Sponsor / Distributor Wise API Switching</a></li>
                                        <li><a href="#">BBPS API Switching </a></li>
                                        <li><a href="#"> Back-Up API</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li class="sidebar-main-title">
                                    <div>
                                        <h6 class="lan-8">Applications</h6>
                                    </div>
                                </li> -->
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-project">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-project"></use>
                                        </svg><span>User Management</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">Create User</a></li>
                                        <li><a href="#">User List</a></li>
                                        <li><a href="#">User Sessions List</a></li>
                                        <li><a href="#">User Kyc Approval List</a></li>
                                        <li><a href="#">User Bulk Action</a></li>
                                    </ul>
                                </li>

                                <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-project">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-project"></use>
                                        </svg><span>Recharge & Bill Payment</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">API List</a></li>
                                        <li><a href="#">API Operators</a></li>
                                        <li><a href="#">User Based API Switching</a></li>
                                        <li><a href="#">Amount Wise API Switching</a></li>
                                        <li><a href="#">Amount Range Wise API Switching</a></li>
                                        <li><a href="#">Circle Based API Switching</a></li>
                                        <li><a href="#">Sponsor / Distributor Wise API Switching</a></li>
                                        <li><a href="#">BBPS API Switching </a></li>
                                        <li><a href="#"> Back-Up API</a></li>
                                    </ul>
                                </li>


                                <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-project"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-project"></use>
                                        </svg><span>Payout and PayIN</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">Payout Transactions</a></li>
                                        <li><a href="#">PayIn Transactions</a></li>
                                        <li><a href="#">Manage Payout/PayIn APIs </a></li>
                                        <li><a href="#">Payout Beneficiary List</a></li>
                                        <li><a href="#">PayIn Transactions Settlement </a></li>
                                        <li><a href="#">Payout Company Accounts </a></li>
                                    </ul>
                                </li>





                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-ecommerce">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-ecommerce"></use>
                                        </svg><span>D. Money Transafer</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">DMT Transactions</a></li>
                                        <li><a href="#">Manage DMT APIs</a></li>
                                        <li>
                                            <label class="badge badge-light-success">New</label><a href="#">DMT Customer
                                                List</a>
                                        </li>
                                        <li><a href="#">User Wise DMT Settings</a></li>
                                        <li><a href="#">DMT Bank List</a></li>


                                    </ul>
                                </li>

                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-chat"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-chat"></use>
                                        </svg><span>AEPS</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">AEPS Transactions</a></li>
                                        <li><a href="#">AEPS Banks List</a></li>
                                        <li><a href="#">AEPS Device List</a></li>
                                        <li><a href="#">User Wise AEPS Settings</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-user"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-user"></use>
                                        </svg><span>CMS/PAN Card</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">CMS Transactions </a></li>
                                        <li><a href="#">PAN Card Requests (Mannual) </a></li>
                                        <li><a href="#"> PAN Coupon Requests</a></li>
                                        <li><a href="#">Available Pan Coupons List</a></li>
                                    </ul>
                                </li>

                                <!-- <li class="sidebar-main-title">
                                    <div>
                                        <h6>Components</h6>
                                    </div>
                                </li> -->
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-ui-kits"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-ui-kits"></use>
                                        </svg><span>Admin Reports</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">API Wise Utility Payment Summary</a></li>
                                        <li><a href="#">API Wise DMT Summary</a></li>
                                        <li>
                                            <label class="badge badge-light-warning">Trending</label><a href="#">API
                                                Wise AEPS Summary</a>
                                        </li>
                                        <li><a href="#l">API Wise PAYOUT Summary</a></li>
                                        <li><a href="#">API Wise PayIn Summary</a></li>
                                        <li>
                                            <label class="badge badge-light-success">New</label><a href="#">Use Wallet
                                                Summary</a>
                                        </li>
                                        <li><a href="#">User Wise Utility Payment Summary</a></li>
                                        <li><a href="#">User Wise DMT Summary</a></li>
                                        <li><a href="#">User Wise AEPS Summary</a></li>
                                        <li><a href="#">User Wise PAYOUT Summary</a></li>
                                        <li>
                                            <label class="badge badge-light-warning">Trending</label><a href="#">User
                                                Wise PayIn Summary</a>
                                        </li>
                                        <li>
                                            <label class="badge badge-light-success">New</label><a href="#">User Day
                                                Book Summary</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-bonus-kit">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-bonus-kit"></use>
                                        </svg><span>Wallet Management</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">Manage User Wallet</a></li>
                                        <li><a href="#">Manage System Wallet</a></li>
                                        <li><a href="#">Pending Wallet Requests</a></li>
                                        <li><a href="#">Previous Wallet Requests</a></li>
                                        <li><a href="#">Company Bank Accounts</a></li>
                                        <li><a href="#">Reseller's Bank Accounts </a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-animation">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-animation"></use>
                                        </svg><span>Settings</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">Payout/ Payin Settings</a></li>
                                        <li><a href="#">DMT Settings</a></li>
                                        <li><a href="#">Recharge / BBPS Settings</a></li>
                                        <li><a href="#">SYSTEM Settings</a></li>


                                        <li>
                                            <label class="badge badge-light-success">New</label><a href="#">Manage
                                                Commission Scheme</a>
                                        </li>
                                        <li><a href="#">Reseller Commission Schemes</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-icons"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#fill-icons"></use>
                                        </svg><span>Other Reports</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="#">System Wallet Summary</a></li>
                                        <li><a href="#">User Wise Wallet Summary</a></li>
                                        <li><a href="#">Sent SMS Report</a></li>
                                        <li><a href="#">Manage SMS APIs</a></li>
                                        <li><a href="#">Manage SMS Templates</a></li>
                                        <li><a href="#">Dispute Report</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid dashboard-4">


                    <div class="container-fluid">
                        @yield('content')
                    </div>

                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div
                            class="col-md-12 footer-copyright d-flex flex-wrap align-items-center justify-content-between">
                            <p class="mb-0 f-w-600">Copyright <span class="year-update"> </span> © admin </p>
                            <p class="mb-0 f-w-600">Hand crafted & made with
                                <svg class="footer-icon">
                                    <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#footer-heart"> </use>
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- model -->

    <!-- Modal-->
    <div class="modal fade" id="logOut" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="loginError" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">

                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-toggle-wrapper text-center">
                        <ul class="modal-img">
                            <li> <img src="{{asset('/ui')}}/assets/images/gif/danger.gif" alt="alarm"></li>
                        </ul>
                        <h4> Are you sure you want to log out?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{route('logout')}}"><button class="btn btn-danger" id="logout_request"
                            type="button">Logout?</button></a>
                </div>

            </div>
        </div>
    </div>

    <!-- otp model -->

    <!-- endmodel -->
    <!-- latest jquery-->
    <script src="{{asset('/ui')}}/assets/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('/ui')}}/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="{{asset('/ui')}}/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{asset('/ui')}}/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="{{asset('/ui')}}/assets/js/scrollbar/simplebar.js"></script>
    <script src="{{asset('/ui')}}/assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('/ui')}}/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('/ui')}}/assets/js/sidebar-menu.js"></script>
    <script src="{{asset('/ui')}}/assets/js/sidebar-pin.js"></script>
    <script src="{{asset('/ui')}}/assets/js/slick/slick.min.js"></script>
    <script src="{{asset('/ui')}}/assets/js/slick/slick.js"></script>
    <script src="{{asset('/ui')}}/assets/js/header-slick.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/apex-chart/moment.min.js"></script>
    <!-- calendar js-->
    <script src="{{asset('/ui')}}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('/ui')}}/assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="{{asset('/ui')}}/assets/js/datatable/datatables/datatable.custom1.js"></script>
    <script src="{{asset('/ui')}}/assets/js/dashboard/dashboard_4.js"></script>
    <!-- Plugins JS Ends-->
    <!-- <script src="{{asset('/ui')}}/assets/js/chart/echart/esl.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/config.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/pie-chart/facePrint.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/pie-chart/testHelper.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/pie-chart/custom-transition-texture.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/data/symbols.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/custom.js"></script> -->
    <!-- calendar js-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('/ui')}}/assets/js/script.js"></script>
    <script src="{{asset('/ui')}}/assets/js/script1.js"></script>
    <!-- <script src="{{asset('/ui')}}/assets/js/theme-customizer/customizer.js"></script> -->
    <!-- Theme js-->
    <!-- <script src="{{asset('/ui')}}/assets/js/script.js"></script>
    <script src="{{asset('/ui')}}/assets/js/script1.js"></script> -->
    <!-- <script src="{{asset('/ui')}}/assets/js/theme-customizer/customizer.js"></script> -->
    <!-- Plugin used-->
    <script>
    function LogOut() {
        // logOut
        var modal = new bootstrap.Modal(document.getElementById('logOut'));
        modal.show();
    }
    </script>
</body>

</html>