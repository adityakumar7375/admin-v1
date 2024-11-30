 @extends('user.layout.layout')
 @section('content')


 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.5/dist/bootstrap-table.min.css">
 <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.5/dist/bootstrap-table.min.js"></script>
 <style>
.dropdown .dropdown-toggle {
    background-color: rgba(122, 112, 186, 0.08);
    color: #2a3650;
    border-radius: 10px;
    padding: 5px 10px;
    width: 50px;
    text-align: left;
}
 </style>
 <div class="row">
     <div class="col-xl-12 col-md-12 proorder-md-4">
         <div class="card">
             <div class="card-header card-no-border pb-0">
                 <div class="header-top">
                     <h4>User List</h4>
                 </div>
             </div>
             <div class="card-body pt-0 assignments-table px-0">
                 <div class="table-responsive theme-scrollbar p-3 pb-0 pt-0">
                     <!-- <table class="table display" id="assignments-table" style="width:100%"> -->
                     <table id="assignments-table" class="table-striped table display" data-toggle="table"
                         data-url="/api/users" data-click-to-select="true" data-side-pagination="server"
                         data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                         data-show-columns="true" data-show-refresh="true" data-trim-on-search="false"
                         data-sort-name="id" data-sort-order="desc" data-mobile-responsive="true" data-toolbar=""
                         data-show-export="false" data-maintain-selected="true" data-export-types='["txt","excel"]'
                         data-query-params="queryParams">
                         <thead>
                             <tr>
                                 <th data-field="action">Action</th>

                                 <th data-field="userID">User ID</th>
                                 <th data-field="userName">User Name</th>
                                 <th data-field="userMobile">User Mobile</th>
                                 <th data-field="userEmail">User Email</th>
                                 <th data-field="mainWallet">Main Wallet</th>
                                 <th data-field="settlementBalance">Settlement Balance</th>
                                 <th data-field="virtualBalance">Virtual Balance</th>
                                 <th data-field="cashBackBalance">Cashback Balance</th>
                                 <th data-field="status">Status</th>
                                 <th data-field="profileImage">Profile Image</th>
                                 <th data-field="is_kyc">KYC Status</th>
                                 <th data-field="is_otp">OTP Status</th>
                                 <th data-field="sponsorName">Sponsor Name</th>
                                 <th data-field="distributorName">Distributor Name</th>
                                 <th data-field="masterDistName">Master Distributor Name</th>
                                 <th data-field="role">Role</th>
                                 <th data-field="userCreatedAt">User Created At</th>
                             </tr>
                         </thead>
                         <tbody>


                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>

 </div>

 <script>
// $(document).ready(function() {
//     $('#assignments-table').DataTable({
//         "processing": true,
//         "serverSide": true,
//         "ajax": {
//             "url": "/api/users",
//             "type": "GET"
//         },
//         "columns": [{
//                 "data": "-"
//             },
//             {
//                 "data": "userID"
//             },
//             {
//                 "data": "userName"
//             },
//             {
//                 "data": "userMobile"
//             },
//             {
//                 "data": "userEmail"
//             },
//             {
//                 "data": "mainWallet"
//             },
//             {
//                 "data": "settlementBalance"
//             },
//             {
//                 "data": "virtualBalance"
//             },
//             {
//                 "data": "cashBackBalance"
//             },
//             {
//                 "data": "status"
//             },
//             {
//                 "data": "profileImage"
//             },
//             {
//                 "data": "is_kyc"
//             },
//             {
//                 "data": "is_otp"
//             },
//             {
//                 "data": "sponsorName"
//             },
//             {
//                 "data": "distributorName"
//             },
//             {
//                 "data": "masterDistName"
//             },
//             {
//                 "data": "role"
//             },
//             {
//                 "data": "userCreatedAt"
//             }
//         ]
//     });
// });
 </script>


 @endsection