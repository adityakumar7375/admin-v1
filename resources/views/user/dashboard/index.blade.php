 @extends('user.layout.layout')
 @section('content')

 <div class="row">
     <div class="col-md-12 project-list">
         <div class="card">
             <div class="row">
                 <div class="col-md-12 text-right">
                     <div class="form-check radio radio-primary ps-0">
                         @foreach(@$data['data']['type'] as $key=>$value)
                         <a href="{{url('dashboard?filter='.$value)}}"><button
                                 class="btn button-light-warning btn-sm b-r-8">{{$value}}
                             </button></a>
                         @endforeach
                     </div>
                 </div>

             </div>
         </div>
     </div>
     <div class="col-xl-6 col-md-12 proorder-md-1">
         <div class="row">
             <div class="col-xl-6 col-sm-6">
                 <div class="card">
                     <div class="card-body student">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['total']['success']}}</h2>
                                 <p class="mb-0 text-truncate"> Total Success</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 17.06%</span>than last 6 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/student.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-6 col-sm-6">
                 <div class="card">
                     <div class="card-body student-2">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['total']['successCount']}}</h2>
                                 <p class="mb-0 text-truncate"> Success Count</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-success"><i
                                             class="icon-arrow-up font-success"></i></p><span
                                         class="f-w-500 font-success">+27.02%</span>than last 4 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/teacher.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-6 col-sm-6">
                 <div class="card">
                     <div class="card-body student-3">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['total']['failed']}}</h2>
                                 <p class="mb-0 text-truncate"> Failed</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-success"><i
                                             class="icon-arrow-up font-success"></i></p><span
                                         class="f-w-500 font-success">+ 12.01%</span>than last 8
                                     Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/calendar.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-6 col-sm-6">
                 <div class="card">
                     <div class="card-body student-4">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['total']['failedCount']}}</h2>
                                 <p class="mb-0 text-truncate">Failed Count</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="col-xl-6 col-sm-6">
                 <div class="card">
                     <div class="card-body student-4">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['total']['pending']}}</h2>
                                 <p class="mb-0 text-truncate">Pending</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="col-xl-6 col-sm-6">
                 <div class="card">
                     <div class="card-body student-4">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['total']['pendingCount']}}</h2>
                                 <p class="mb-0 text-truncate">Pending Count</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>




         </div>
     </div>
     <div class="col-xl-6 col-md-6 proorder-md-2">
         <div class="card">
             <div class="card-header">
                 <h4>Bar chart 2</h4>
             </div>
             <div class="card-body">

                 <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

             </div>
         </div>
     </div>



     <!-- walletTotal -->











     <div class="col-xl-12 col-md-12 proorder-md-4">
         <div class="card">
             <div class="card-header card-no-border pb-0">
                 <div class="header-top">
                     <h4>Wallet Total</h4>
                     <div class="dropdown icon-dropdown">
                         <button class="btn dropdown-toggle" id="userdropdown1" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false"><i class="icon-more-alt"></i></button>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown1"><a
                                 class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                 href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                     </div>
                 </div>
             </div>
             <div class="card-body pt-0 assignments-table px-0">
                 <div class="table-responsive theme-scrollbar">
                     <table class="table display" id="assignments-table" style="width:100%">
                         <thead>
                             <tr>

                                 <th>Sno </th>
                                 <th>Role Name</th>
                                 <th>User Count </th>
                                 <th>Total Balance</th>
                                 <th>Total V Balance</th>
                                 <th>Total Cashback</th>
                                 <th>Total Credit Balance</th>
                             </tr>
                         </thead>
                         <tbody>
                             @if(!empty($data['data']['walletTotal']))
                             @foreach(@$data['data']['walletTotal'] as $row)
                             <tr>

                                 <td> <span>{{$row['role_id']}}</span></td>
                                 <td> <span>{{$row['role_name']}}</span></td>
                                 <td> <span>{{$row['user_count']}}</span></td>
                                 <td> <span>{{$row['total_balance']}}</span></td>
                                 <td> <span>{{$row['total_v_balance']}}</span></td>
                                 <td> <span>{{$row['total_cashback']}}</span></td>
                                 <td> <span>{{$row['total_credit_balance']}}</span></td>


                             </tr>
                             @endforeach
                             @endif

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-12 col-md-12 proorder-md-5">
         <div class="row">
             <div class="col-xl-4 col-sm-6">
                 <div class="card">
                     <div class="card-body student-4">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['pendingComplaints']}}</h2>
                                 <p class="mb-0 text-truncate">pendingComplaints</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>








             <div class="col-xl-4 col-sm-6">
                 <div class="card">
                     <div class="card-body student-4">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['pendingWalletRequests']}}</h2>
                                 <p class="mb-0 text-truncate">pendingWalletRequests</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>



             <div class="col-xl-4 col-sm-6">
                 <div class="card">
                     <div class="card-body student-4">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['mainWalletBalance']}}</h2>
                                 <p class="mb-0 text-truncate">mainWalletBalance</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="col-xl-4 col-sm-6">
                 <div class="card">
                     <div class="card-body student-4">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['creditWalletBalance']}}</h2>
                                 <p class="mb-0 text-truncate">creditWalletBalance</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-4 col-sm-6">
                 <div class="card">
                     <div class="card-body student-4">
                         <div class="d-flex gap-2 align-items-end">
                             <div class="flex-grow-1">
                                 <h2>{{@$data['data']['cashBackWalletBalance']}}</h2>
                                 <p class="mb-0 text-truncate">cashBackWalletBalance</p>
                                 <div class="d-flex student-arrow text-truncate">
                                     <p class="mb-0 up-arrow bg-light-danger"><i
                                             class="icon-arrow-down font-danger"></i></p><span
                                         class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                 </div>
                             </div>
                             <div class="flex-shrink-0"><img
                                     src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>










         </div>
     </div>
     <!-- <div class="col-xxl-4 col-xl-7 box-col-7 col-md-6 proorder-md-3">
         <div class="card">
             <div class="card-header card-no-border pb-0">
                 <div class="header-top">
                     <h4>Actively Hours</h4>
                     <div class="dropdown icon-dropdown">
                         <button class="btn dropdown-toggle" id="userdropdown10" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false"><i class="icon-more-alt"></i></button>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown10"><a
                                 class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                 href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                     </div>
                 </div>
             </div>
             <div class="card-body">
                 <div id="actively-hours"></div>
             </div>
         </div>
     </div>
     <div class="col-xxl-3 col-xl-5 box-col-5 col-md-6 proorder-md-6">
         <div class="card">
             <div class="card-header card-no-border pb-0">
                 <div class="header-top">
                     <h4>Enrolled Classes</h4>
                     <div class="dropdown icon-dropdown">
                         <button class="btn dropdown-toggle" id="userdropdown11" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false"><i class="icon-more-alt"></i></button>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown11"><a
                                 class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                 href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                     </div>
                 </div>
             </div>
             <div class="card-body pt-0 pb-1">
                 <ul class="enrolled-class">
                     <li class="d-flex align-items-center gap-2"><span class="b-primary bg-primary"></span>
                         <div class="flex-grow-1"> <a href="">
                                 <h5 class="text-truncate">After Effects CC Masterclass </h5>
                             </a>
                             <p>10:20 -11:30</p>
                         </div>
                         <div class="flex-shrink-0">
                             <div class="dropdown icon-dropdown">
                                 <button class="btn dropdown-toggle" id="userdropdown12" type="button"
                                     data-bs-toggle="dropdown" aria-expanded="false"><i
                                         class="icon-angle-right"></i></button>
                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown12"><a
                                         class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                         href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                             </div>
                         </div>
                     </li>
                     <li class="d-flex align-items-center gap-2"><span class="b-secondary bg-secondary"></span>
                         <div class="flex-grow-1"> <a href="">
                                 <h5 class="text-truncate">Design from A to Z</h5>
                             </a>
                             <p>09:00 -10:30</p>
                         </div>
                         <div class="flex-shrink-0">
                             <div class="dropdown icon-dropdown">
                                 <button class="btn dropdown-toggle" id="userdropdown13" type="button"
                                     data-bs-toggle="dropdown" aria-expanded="false"><i
                                         class="icon-angle-right"></i></button>
                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown13"><a
                                         class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                         href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                             </div>
                         </div>
                     </li>
                     <li class="d-flex align-items-center gap-2"><span class="b-warning bg-warning"></span>
                         <div class="flex-grow-1"> <a href="">
                                 <h5 class="text-truncate">Graphic Design Bootcamp</h5>
                             </a>
                             <p>15:00 -16:00</p>
                         </div>
                         <div class="flex-shrink-0">
                             <div class="dropdown icon-dropdown">
                                 <button class="btn dropdown-toggle" id="userdropdown14" type="button"
                                     data-bs-toggle="dropdown" aria-expanded="false"><i
                                         class="icon-angle-right"></i></button>
                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown14"><a
                                         class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                         href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                             </div>
                         </div>
                     </li>
                     <li class="d-flex align-items-center gap-2"><span class="b-tertiary bg-tertiary"></span>
                         <div class="flex-grow-1"> <a href="">
                                 <h5 class="text-truncate">The Ultimate Guide to Usabillity</h5>
                             </a>
                             <p>13:25 -14:30</p>
                         </div>
                         <div class="flex-shrink-0">
                             <div class="dropdown icon-dropdown">
                                 <button class="btn dropdown-toggle" id="userdropdown15" type="button"
                                     data-bs-toggle="dropdown" aria-expanded="false"><i
                                         class="icon-angle-right"></i></button>
                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown15"><a
                                         class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                         href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                             </div>
                         </div>
                     </li>
                     <li class="d-flex align-items-center gap-2"><span class="b-success bg-success"></span>
                         <div class="flex-grow-1"> <a href="">
                                 <h5 class="text-truncate">After Effects CC Masterclass</h5>
                             </a>
                             <p>12:45 -14:20</p>
                         </div>
                         <div class="flex-shrink-0">
                             <div class="dropdown icon-dropdown">
                                 <button class="btn dropdown-toggle" id="userdropdown16" type="button"
                                     data-bs-toggle="dropdown" aria-expanded="false"><i
                                         class="icon-angle-right"></i></button>
                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown16"><a
                                         class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                         href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                             </div>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="col-xxl-5 col-xl-6 box-col-6 proorder-4-xl-1 proorder-md-7">
         <div class="card">
             <div class="card-header card-no-border pb-0">
                 <div class="header-top">
                     <h4>Featured Courses</h4>
                     <div class="dropdown icon-dropdown">
                         <button class="btn dropdown-toggle" id="userdropdown17" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false"><i class="icon-more-alt"></i></button>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown17"><a
                                 class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                 href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                     </div>
                 </div>
             </div>
             <div class="card-body p-0 featured-table">
                 <div class="table-responsive theme-scrollbar">
                     <table class="table display" id="featured-table" style="width:100%">
                         <thead>
                             <tr>
                                 <th>Course Name</th>
                                 <th>Start</th>
                                 <th>Rate</th>
                                 <th>Type</th>
                                 <th>Save</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>
                                     <div class="d-flex align-items-center gap-2">
                                         <div class="flex-shrink-0"> <img
                                                 src="{{asset('/ui')}}/assets/images/dashboard-4/featured/1.png" alt="">
                                         </div>
                                         <div class="flex-grow-1"><a href="product-page.html">
                                                 <h5>Mobile UX</h5>
                                             </a><span>Erin Mooney</span></div>
                                     </div>
                                 </td>
                                 <td>Feb 15</td>
                                 <td> <span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary"
                                             data-feather="star"> </i>4.8</span>
                                 </td>
                                 <td>UX/UI Design</td>
                                 <td class="initial-color" id="colorChangeButton"><i data-feather="bookmark"> </i></td>
                             </tr>
                             <tr>
                                 <td>
                                     <div class="d-flex align-items-center gap-2">
                                         <div class="flex-shrink-0"><img
                                                 src="{{asset('/ui')}}/assets/images/dashboard-4/featured/2.png" alt="">
                                         </div>
                                         <div class="flex-grow-1"><a href="product-page.html">
                                                 <h5>Illustration</h5>
                                             </a><span>Elsie Lemon</span></div>
                                     </div>
                                 </td>
                                 <td>Mar 22</td>
                                 <td> <span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary"
                                             data-feather="star"> </i>2.3</span>
                                 </td>
                                 <td>Web Designer</td>
                                 <td class="initial-color" id="colorChangeButton1"><i data-feather="bookmark"> </i></td>
                             </tr>
                             <tr>
                                 <td>
                                     <div class="d-flex align-items-center gap-2">
                                         <div class="flex-shrink-0"><img
                                                 src="{{asset('/ui')}}/assets/images/dashboard-4/featured/3.png" alt="">
                                         </div>
                                         <div class="flex-grow-1"><a href="product-page.html">
                                                 <h5>Design System</h5>
                                             </a><span>Anna Green</span></div>
                                     </div>
                                 </td>
                                 <td>Jun 28</td>
                                 <td> <span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary"
                                             data-feather="star"> </i>1.5</span>
                                 </td>
                                 <td>Developer</td>
                                 <td class="initial-color" id="colorChangeButton2"><i data-feather="bookmark"> </i></td>
                             </tr>
                             <tr>
                                 <td>
                                     <div class="d-flex align-items-center gap-2">
                                         <div class="flex-shrink-0"><img
                                                 src="{{asset('/ui')}}/assets/images/dashboard-4/featured/4.png" alt="">
                                         </div>
                                         <div class="flex-grow-1"><a href="product-page.html">
                                                 <h5>Leadership</h5>
                                             </a><span>John Elliot</span></div>
                                     </div>
                                 </td>
                                 <td>Apr 04</td>
                                 <td> <span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary"
                                             data-feather="star"> </i>2.4</span>
                                 </td>
                                 <td>UX/UI Design</td>
                                 <td class="initial-color" id="colorChangeButton3"><i data-feather="bookmark"> </i></td>
                             </tr>
                             <tr>
                                 <td>
                                     <div class="d-flex align-items-center gap-2">
                                         <div class="flex-shrink-0"><img
                                                 src="{{asset('/ui')}}/assets/images/dashboard-4/featured/5.png" alt="">
                                         </div>
                                         <div class="flex-grow-1"><a href="product-page.html">
                                                 <h5>Latest Figma</h5>
                                             </a><span>Dylan Field</span></div>
                                     </div>
                                 </td>
                                 <td>jun 01</td>
                                 <td><span class="d-flex align-item-center gap-2 font-primary"> <i class="font-primary"
                                             data-feather="star"> </i>5.4</span>
                                 </td>
                                 <td>Graphic Designer</td>
                                 <td class="initial-color" id="colorChangeButton4"><i data-feather="bookmark"> </i></td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div> -->
     <!-- <div class="col-xxl-7 col-xl-12 box-col-12 proorder-md-8">
         <div class="card">
             <div class="card-header card-no-border pb-0">
                 <div class="header-top">
                     <h4>Monthly Attendance Report (Feb)</h4>
                     <div class="dropdown icon-dropdown">
                         <button class="btn dropdown-toggle" id="userdropdown18" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false"><i class="icon-more-alt"></i></button>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown18"><a
                                 class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                 href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                     </div>
                 </div>
             </div>
             <div class="card-body pb-0">
                 <div class="monthly-report">
                     <ul class="d-flex align-item-center gap-2">
                         <li> <span class="bg-primary"> </span>Teacher</li>
                         <li> <span class="bg-secondary"> </span>Student</li>
                     </ul>
                 </div>
                 <div id="monthly-reportchart"></div>
             </div>
         </div>
     </div>
     <div class="col-xxl-5 col-xl-6 box-col-6 proorder-md-9">
         <div class="card">
             <div class="card-header card-no-border pb-0">
                 <div class="header-top">
                     <h4>Schedule</h4>
                     <div class="dropdown icon-dropdown">
                         <button class="btn dropdown-toggle" id="userdropdown19" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false"><i class="icon-more-alt"></i></button>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown19"><a
                                 class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                 href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                     </div>
                 </div>
             </div>
             <div class="card-body schedult-calendar pt-0">
                 <div class="schedule-container">
                     <div id="schedulechart"></div>
                 </div>
             </div>
         </div>
     </div> -->
 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

 <script>
var xValues = <?=json_encode(@$data['data']['monthlyReport']['months'])?>;
var yValues = <?=json_encode(@$data['data']['monthlyReport']['values'])?>;
var barColors = ["red", "green", "blue", "orange", "brown", "purple", "yellow", "pink", "gray", "cyan", "lime",
    "indigo"
];


new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: "World Wine Production 2018"
        }
    }
});
 </script>
 @endsection