 @extends('user.layout.layout')
 @section('content')




 <style>
.dropdown .dropdown-toggle {
    background-color: rgb(122 112 186 / 0%);
    color: #2a3650;
    border-radius: 10px;
    padding: 5px 10px;
    width: 50px;
    text-align: center;
    /* text-align: left; */
}
 </style>
 <div class="row">
     <div class="col-sm-12">
         <div class="card">
             <form action="return:false" method="post" class="theme-form" id="submitForm">
                 <div class="card-header">

                     <div class="row">
                         <div class="col-6">
                             <h4>Create New Account</h4>
                         </div>
                         <div class="col-6 text-end"><button class="btn btn-primary" type="submit">Submit form</button>
                         </div>
                     </div>
                 </div>
                 <div class="card-body row">

                     <div class="col-md-4 position-relative">
                         <label class="form-label" for="validationTooltip04">Select Role</label>
                         <select class="form-select" id="validationTooltip04" name="userRole" required="">
                             <option selected="" disabled="" value="">Role...</option>
                             @foreach($data['role'] as $key=>$value)
                             <option value="{{$value}}">{{$key}}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="col-md-4 position-relative">
                         <label class="form-label" for="validationTooltip01">Mobile</label>
                         <input class="form-control" id="validationTooltip01" name="regMobile" type="number"
                             onkeyup="checkMobile(this.value)" placeholder="Mobile" required="">
                     </div>
                     <div class="col-md-4 position-relative">
                         <label class="form-label" for="validationTooltip02">Name</label>
                         <input class="form-control" id="validationTooltip02" name="regName" type="text"
                             placeholder="Name" required="">
                     </div>
                     <div class="col-md-4 position-relative">
                         <label class="form-label" for="validationTooltipUsername">Email</label>
                         <input class="form-control b-r-0" name="regEmail" id="validationTooltipUsername" type="text"
                             placeholder="Email" required="">
                     </div>
                     <div class="col-md-4 position-relative">
                         <label class="form-label" for="validationTooltip03">State</label>
                         <select class="form-select select2" name="userState" id="validationTooltip04" required="">
                             <option selected="" disabled="" value="">State...</option>
                             @foreach($state as $row)
                             <option value="{{$row['id']}}">{{$row['name']}}</option>
                             @endforeach
                         </select>
                     </div>

                     <div class="col-md-4 position-relative">
                         <label class="form-label" for="validationTooltip05">Sponsor Mobile</label>
                         <input class="form-control" id="validationTooltip05" name="parentMobile" type="text"
                             required="" placeholder="Sponsor Mobile">
                     </div>


                 </div>

             </form>
         </div>
     </div>
     <div class="col-xl-12 col-md-12 proorder-md-4">
         <div class="card">
             <div class="card-header card-no-border pb-0">
                 <div class="row">
                     <div class="col-sm-3">
                         <h4>User List</h4>
                     </div>
                     <div class="col-sm-9">
                         <div class="row">

                             <div class="col-4">
                                 <select class="form-select" id="role_filter" onchange="FilterData()">
                                     <option selected="" disabled="" value="">Select Role</option>
                                     @foreach($data['role'] as $key=>$value)
                                     <option value="{{$value}}">{{$key}}</option>
                                     @endforeach
                                 </select>

                             </div>
                             <div class="col-4">
                                 <select class="form-select" id="status_filter" onchange="FilterData()">
                                     <option selected="" disabled="" value="">Select Status</option>
                                     @foreach($data['status'] as $key=>$value)
                                     <option value="{{$value}}">{{$key}}</option>
                                     @endforeach
                                 </select>

                             </div>
                             <div class="col-4">
                                 <input class="form-control" id="filter_mobile" onkeyup="FilterData()" type="tel"
                                     placeholder="Mobile">
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
             <div class="card-body pt-0 assignments-table px-0">
                 <div class="table-responsive theme-scrollbar p-3 pb-0 pt-0">
                     <!-- <table class="table display" id="assignments-table" style="width:100%"> -->
                     <table class="table-striped  " data-toggle="table" data-url="/users/list"
                         data-click-to-select="true" data-side-pagination="server" data-pagination="true"
                         data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false" data-show-columns="true"
                         data-show-refresh="true" data-trim-on-search="false" data-sort-name="id" data-sort-order="desc"
                         data-mobile-responsive="true" data-toolbar="" data-show-export="false" data-page-size="5"
                         data-maintain-selected="true" data-export-types='["txt","excel"]'
                         data-query-params="userQueryParams">
                         <thead>
                             <tr>
                                 <th data-field="action">Action</th>

                                 <th data-field="profileImage">Profile Image</th>
                                 <th data-field="userID">User ID</th>
                                 <th data-field="userName">User Name</th>
                                 <th data-field="userMobile">User Mobile</th>
                                 <th data-field="userEmail">User Email</th>
                                 <th data-field="mainWallet">Main Wallet</th>
                                 <th data-field="settlementBalance">Settlement Balance</th>
                                 <th data-field="virtualBalance">Virtual Balance</th>
                                 <th data-field="cashBackBalance">Cashback Balance</th>
                                 <th data-field="status">Status</th>
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


 @endsection