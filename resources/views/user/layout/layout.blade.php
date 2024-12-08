@php $webData = Cache::get('web'); $datalogin = (session('user')); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=".">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="icon" href="{{Cache::get('img_url').'/'.$webData['data']['favicon']}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{Cache::get('img_url').'/'.$webData['data']['favicon']}}" type="image/x-icon">
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />
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

    <link rel="stylesheet" type="text/css" href="{{asset('/ui')}}/assets/css/loader.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
    .parsley-required {
        color: red;
    }

    .dashboard-4 .assignments-table table tbody tr td:last-child,
    .dashboard-4 .assignments-table table tbody tr td:first-child {
        padding-left: 0px;
        padding-right: 0px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="waiting" style="display:none;z-index:999999">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner-1"></div>
        </div>
    </div>
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
                <div class="logo-wrapper"><a href="index"><img class="img-fluid for-light"
                            src="{{asset('/ui')}}/assets/images/logo/logo.png" alt="" /><img class="img-fluid for-dark"
                            src="{{asset('/ui')}}/assets/images/logo/logo_light.png" alt="" /></a></div>
            </div>
            <div class="col-4 col-xl-4 page-title">
                <h4 class="f-w-700">{{@$webData['data']['companyName']}}</h4>
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


                            <li>
                                <div class="mode">
                                    <svg>
                                        <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#moon"></use>
                                    </svg>
                                </div>
                            </li>


                            <li class="profile-nav onhover-dropdown px-0 py-0">
                                <div class="d-flex profile-media align-items-center"><img class="img-30"
                                        src="{{asset('/ui')}}/assets/images/dashboard/profile.png" alt="">
                                    <div class="flex-grow-1"><span>{{@$datalogin->userName}}</span>
                                        <p class="mb-0 font-outfit">{{@$datalogin->userId}}<i
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
                    <div class="logo-wrapper"><a href="index"><img class="img-fluid"
                                src="{{Cache::get('img_url').'/'.$webData['data']['logoImage']}}" alt=""></a>
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
                                <li class="back-btn"><a href="index"><img class="img-fluid"
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
                                            <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#stroke-home"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('/ui')}}/assets/svg/icon-sprite.svg#stroke-home"></use>
                                        </svg><span>Dashboard</span></a>
                                </li>



                                <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-user"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-user"></use>
                                        </svg><span>User Management</span></a>
                                    <ul class="sidebar-submenu">
                                        <!-- <li><a href="{{route('user.list')}}">Create User</a></li> -->
                                        <li><a href="{{route('user.list')}}">User List</a></li>
                                        <li><a href="{{route('user.sessions')}}">User Sessions List</a></li>
                                        <li><a href="{{route('user.kyc.list')}}">User Kyc Approval List</a></li>
                                        <li><a href="{{route('user.bulk')}}">User Bulk Action</a></li>
                                    </ul>
                                </li>

                                <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-bonus-kit">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-bonus-kit">
                                            </use>
                                        </svg><span>Recharge & Bill Payment</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{route('api.list')}}">API List</a></li>
                                        <li><a href="{{route('api.operators')}}">API Operators</a></li>
                                        <li><a href="{{route('user.based.switching')}}">User Based API Switching</a>
                                        </li>
                                        <li><a href="{{route('amount.wise.api')}}">Amount Wise API Switching</a></li>
                                        <li><a href="{{route('amount.range.wise.api')}}">Amount Range Wise API
                                                Switching</a></li>
                                        <li><a href="{{route('circle.based.api')}}">Circle Based API Switching</a></li>
                                        <li><a href="{{route('sponsor.distributor')}}">Sponsor / Distributor Wise API
                                                Switching</a></li>
                                        <li><a href="{{route('bbps.api')}}">BBPS API Switching </a></li>
                                        <li><a href="{{route('back.up.api')}}"> Back-Up API</a></li>
                                    </ul>
                                </li>


                                <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-bookmark">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-bookmark">
                                            </use>
                                        </svg><span>Payout and PayIN</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{route('payout.transactions')}}">Payout Transactions</a></li>
                                        <li><a href="{{route('payin.transactions')}}">PayIn Transactions</a></li>
                                        <li><a href="{{route('manage.payout.payin')}}">Manage Payout/PayIn APIs </a>
                                        </li>
                                        <li><a href="{{route('payout.beneficiary.list')}}">Payout Beneficiary List</a>
                                        </li>
                                        <li><a href="{{route('payin.transactions.settlement')}}">PayIn Transactions
                                                Settlement </a></li>
                                        <li><a href="{{route('payout.company.accounts')}}">Payout Company Accounts </a>
                                        </li>
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
                                        </svg><span>Money Transafer</span></a>


                                    <ul class="sidebar-submenu">
                                        <li><a href="{{route('dmt.transactions')}}">DMT Transactions</a></li>
                                        <li><a href="{{route('manage.dmt.apis')}}">Manage DMT APIs</a></li>
                                        <li>
                                            <label class="badge badge-light-success">New</label><a
                                                href="{{route('dmt.customer.list')}}">DMT Customer List</a>
                                        </li>
                                        <li><a href="{{route('user.dmt.settings')}}">User Wise DMT Settings</a></li>
                                        <li><a href="{{route('dmt.bank.list')}}">DMT Bank List</a></li>


                                    </ul>
                                </li>

                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                        class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-animation">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{asset('ui')}}/assets/svg/icon-sprite.svg#stroke-animation">
                                            </use>
                                        </svg><span>AEPS </span></a>

                                    <ul class="sidebar-submenu">
                                        <li><a href="{{route('aeps.transactions')}}">AEPS Transactions</a></li>
                                        <li><a href="{{route('aeps.bank.list')}}">AEPS Banks List</a></li>
                                        <li><a href="{{route('aeps.device.list')}}">AEPS Device List</a></li>
                                        <li><a href="{{route('wise.aeps.settings')}}">User Wise AEPS Settings</a></li>
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
                                        <li><a href="{{route('cms.transactions')}}">CMS Transactions </a></li>
                                        <li><a href="{{route('pan.card.requests')}}">PAN Card Requests (Mannual) </a>
                                        </li>
                                        <li><a href="{{route('pan.coupon.requests')}}"> PAN Coupon Requests</a></li>
                                        <li><a href="{{route('available.pan.coupons')}}">Available Pan Coupons List</a>
                                        </li>
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
                                        <li><a href="{{route('payment.summary')}}">API Wise Utility Payment Summary</a>
                                        </li>
                                        <li><a href="{{route('api.dmtsummary')}}">API Wise DMT Summary</a></li>
                                        <li>
                                            <a href="{{route('api.aepssummary')}}">API Wise AEPS Summary</a>
                                        </li>
                                        <li><a href="{{route('api.payout')}}">API Wise PAYOUT Summary</a></li>
                                        <li><a href="{{route('user.list')}}">API Wise PayIn Summary</a></li>
                                        <li>
                                            <label class="badge badge-light-success">New</label><a
                                                href="{{route('use.walletsummary')}}">Use Wallet Summary</a>
                                        </li>
                                        <li><a href="{{route('utility.paymentsummary')}}">User Wise Utility Payment
                                                Summary</a></li>
                                        <li><a href="{{route('user.wisedmt')}}">User Wise DMT Summary</a></li>
                                        <li><a href="{{route('user.wiseaeps')}}">User Wise AEPS Summary</a></li>
                                        <li><a href="{{route('user.wisepayout')}}">User Wise PAYOUT Summary</a></li>
                                        <li>
                                            <label class="badge badge-light-warning">Trending</label><a
                                                href="{{route('user.payinsummary')}}">User Wise PayIn Summary</a>
                                        </li>
                                        <li>
                                            <label class="badge badge-light-success">New</label><a
                                                href="{{route('user.booksummary')}}">User Day Book Summary</a>
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
                                        <li><a href="{{route('manage.user.wallet')}}">Manage User Wallet</a></li>
                                        <li><a href="{{route('manage.system.wallet')}}">Manage System Wallet</a></li>
                                        <li><a href="{{route('pending.wallet.requests')}}">Pending Wallet Requests</a>
                                        </li>
                                        <li><a href="{{route('previous.wallet.requests')}}">Previous Wallet Requests</a>
                                        </li>
                                        <li><a href="{{route('company.bank.accounts')}}">Company Bank Accounts</a></li>
                                        <li><a href="{{route('reseller.bank.accounts')}}">Reseller's Bank Accounts </a>
                                        </li>
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
                                        <li><a href="{{route('payout.payin.settings')}}">Payout/ Payin Settings</a></li>
                                        <li><a href="{{route('dmt.settings')}}">DMT Settings</a></li>
                                        <li><a href="{{route('recharge.bbps')}}">Recharge / BBPS Settings</a></li>
                                        <li><a href="{{route('system.settings')}}">SYSTEM Settings</a></li>


                                        <li>
                                            <label class="badge badge-light-success">New</label><a
                                                href="{{route('manage.commission.scheme')}}">Manage Commission
                                                Scheme</a>
                                        </li>
                                        <li><a href="{{route('reseller.commission.schemes')}}">Reseller Commission
                                                Schemes</a></li>
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
                                        <li><a href="{{route('system.wallet.summary')}}">System Wallet Summary</a></li>
                                        <li><a href="{{route('user.wise.wallet')}}">User Wise Wallet Summary</a></li>
                                        <li><a href="{{route('sent.sms.report')}}">Sent SMS Report</a></li>
                                        <li><a href="{{route('manage.sms.apis')}}">Manage SMS APIs</a></li>
                                        <li><a href="{{route('manage.sms.templates')}}">Manage SMS Templates</a></li>
                                        <li><a href="{{route('dispute.report')}}">Dispute Report</a></li>
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
    @yield('model')
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



    <script src="{{asset('/ui')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('/ui')}}/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

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

    <script src="{{asset('/ui')}}/assets/js/select2/tagify.js"></script>
    <script src="{{asset('/ui')}}/assets/js/select2/tagify.polyfills.min.js"></script>
    <script src="{{asset('/ui')}}/assets/js/select2/intltelinput.min.js"></script>
    <!-- <script src="{{asset('/ui')}}/assets/js/select2/telephone-input.js"> </script> -->
    <!-- <script src="{{asset('/ui')}}/assets/js/select2/custom-inputsearch.js"></script> -->
    <!-- <script src="{{asset('/ui')}}/assets/js/select2/select3-custom.js"></script> -->
    <!-- <script src="{{asset('/ui')}}/assets/js/chart/echart/esl.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/config.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/pie-chart/facePrint.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/pie-chart/testHelper.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/pie-chart/custom-transition-texture.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/data/symbols.js"></script>
    <script src="{{asset('/ui')}}/assets/js/chart/echart/custom.js"></script> -->
    <!-- calendar js-->
    <!-- Plugins JS Ends-->
    <script src="{{asset('/ui')}}/assets/js/script.js"></script>
    <script src="{{asset('/ui')}}/assets/js/script1.js"></script>

    <script src="{{asset('/ui')}}/extra/parsley.min.js"></script>
    <script src="{{asset('/ui')}}/extra/iziToast.min.js"></script>
    <script src="{{asset('/ui')}}/assets/js/sweet-alert/sweetalert.min.js"></script>

    <!-- Theme js-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.5/dist/bootstrap-table.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.5/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/export/bootstrap-table-export.min.js">
    </script>


    <script>
    function FilterData() {
        $('.table-striped').bootstrapTable('refresh');
    }

    function LogOut() {
        // logOut
        var modal = new bootstrap.Modal(document.getElementById('logOut'));
        modal.show();
    }
    $(document).ready(function() {
        // $('.select2').select2();

    });
    $(document).ready(function() {
        $('form').parsley();
    });

    // error code

    function processResponse(data) {
        $(".waiting").hide();
        console.log(data);
        const msg = data.message;
        if (data.errorCode == 200) {
            // hide model
            var modal = bootstrap.Modal.getInstance(document.getElementById('updatewallet'));
            modal.hide();

            // 2
            $('.table-striped').bootstrapTable('refresh');
            $('#submitForm')[0].reset();
            const msg = data.message;
            iziToast.show({
                icon: 'fa fa-check',
                color: 'green',
                message: msg,
                position: 'topCenter',
            });

        }
        if (data.errorCode == 202) {
            // set token

            const msg = data.message;
            iziToast.show({
                icon: 'fa fa-check',
                color: 'green',
                message: msg,
                position: 'topCenter',
            });

        }
        if (data.errorCode == 404) {
            const msg = data.message;
            iziToast.show({
                icon: 'fa fa-check',
                color: 'green',
                message: msg,
                position: 'topCenter',
            });
        }
        if (data.errorCode == 301) {
            const msg = data.message;

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
        $(".waiting").show();
        $.ajax({
            url: url,
            type: 'POST',
            data: JSON.stringify(data),
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            success: function(response) {
                processResponse(response);
            },
            error: function(xhr, status, error) {
                $('.table-striped').bootstrapTable('refresh');
                $(".waiting").hide();
                if (xhr.status === 400) {
                    // Handle 400 - Bad Request
                    try {
                        // Parse the response body if it's in JSON format
                        const errorResponse = JSON.parse(xhr.responseText);
                        // You can now handle the error based on the response from the server
                        console.error('Bad Request:', errorResponse);
                        iziToast.show({
                            icon: 'fa fa-times',
                            color: 'orange',
                            message: 'Bad Request: ' + (errorResponse.message || 'Invalid input'),
                            position: 'topCenter',
                        });
                    } catch (e) {
                        // Handle the case where the response is not valid JSON
                        console.error('Error parsing response:', e);
                        iziToast.show({
                            icon: 'fa fa-times',
                            color: 'orange',
                            message: 'Bad Request: Invalid input',
                            position: 'topCenter',
                        });
                    }
                } else {
                    // Handle other HTTP error statuses, e.g., 500
                    iziToast.show({
                        icon: 'fa fa-check',
                        color: 'red',
                        message: 'Server Error ' + xhr.status,
                        position: 'topCenter',
                    });
                }
            }
        });

    }

    // confirmData

    function confirmData(url, sendData) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                const response = SendServerRequest(url, sendData);
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error"
                });
            }
        });
    }
    </script>
    @yield('script')
</body>

</html>