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
             <div class="card-header ">
                 <div class="row">
                     <div class="col-sm-12">
                         <h4>User List</h4>
                     </div>

                     <div class="col-sm-3">
                         <select class="form-select" id="role_filter">
                             <option selected="" disabled="" value="">Select Role</option>
                             @foreach($data['role'] as $key=>$value)
                             <option value="{{$value}}">{{$key}}</option>
                             @endforeach
                         </select>

                     </div>
                     <div class="col-sm-3">
                         <select class="form-select" id="status_filter">
                             <option selected="" disabled="" value="">Select Status</option>
                             @foreach($data['status'] as $key=>$value)
                             <option value="{{$value}}">{{$key}}</option>
                             @endforeach
                         </select>

                     </div>
                     <div class="col-sm-3">
                         <input class="form-control" id="filter_mobile" type="tel" placeholder="Mobile">
                     </div>
                     <div class="col-sm-3">
                         <input class="form-control" id="sponsorMobile" type="tel" placeholder="Sponsor Mobile">
                     </div>
                     <div class="col-sm-3 mt-3">
                         <div class="input-group flatpicker-calender">
                             <input class="form-control" id="range-date" type="date" placeholder="Select Date">
                         </div>
                         <!-- <input class="form-control" id="sponsorMobile" type="tel" placeholder="Date Range"> -->
                     </div>


                     <div class="col-sm-9 mt-3 text-right text-end">
                         <button class="btn btn-sm btn-primary" onclick="FilterData()">Filter</button>
                         <button class="btn btn-sm btn-danger" onclick="FilterClearData()">Clear</button>
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
                         data-mobile-responsive="true" data-toolbar="" data-show-export="false" data-page-size="10"
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

 @section('model')
 <div class="modal fade" id="updatewallet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="loginError" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content ">

             <div class="modal-header">
                 <h5 class="modal-title" id="logoutModalLabel">Edit Wallet</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="formUpdareWallet" method="post" action="return:false" class="p-2">
                 <div class="modal-body row">


                     <div class="mb-3 col-6">
                         <label for="modalName" class="form-label">Name</label>
                         <input type="text" readonly class="form-control" name="name" id="UserName">
                         <input type="hidden" readonly class="form-control" name="appID" id="appID">
                     </div>
                     <div class="mb-3 col-6">
                         <label for="modalName" class="form-label">Main Wallet</label>
                         <input type="text" readonly class="form-control" name="mainwallet" id="MainWallet">
                     </div>

                     <div class="mb-3 col-12">
                         <!-- <label for="modalName" class="form-label">Main Wallet</label> -->
                         <div class="radio-form">
                             <div class="form-check">
                                 <input class="form-check-input" id="flexRadioDefault1" type="radio" name="txnType"
                                     required="" value="credit">
                                 <label class="form-check-label" for="flexRadioDefault1">Credit</label>
                             </div>
                             <div class="form-check">
                                 <input class="form-check-input" id="flexRadioDefault2" type="radio" name="txnType"
                                     checked="" required="" value="debit">
                                 <label class="form-check-label" for="flexRadioDefault2">Debit</label>
                             </div>
                         </div>
                     </div>
                     <div class="mb-3 col-12">
                         <label for="modalName" class="form-label">Enter Amount</label>
                         <input type="text" class="form-control" id="Amount" name="amount">
                     </div>
                     <div class="mb-3 col-12">
                         <label for="modalName" class="form-label">Enter Pin</label>
                         <input type="text" class="form-control" id="txnPin" name="txnPin">
                     </div>




                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button class="btn btn-success" id="logout_request" type="submit">Update</button>
                 </div>
             </form>

         </div>
     </div>
 </div>
 @endsection

 @section('script')
 <script>
const form = document.getElementById('formUpdareWallet');

function FilterClearData() {
    $('.table-striped').bootstrapTable('refresh');
    $("#role_filter").val('');
    $("#status_filter").val('');
    $("#filter_mobile").val('');
    $("#sponsorMobile").val('');
    $("#range-date").val('');
}

function userQueryParams(p) {
    return {
        role_filter: $("#role_filter").val(),
        status_filter: $("#status_filter").val(),
        filter_mobile: $("#filter_mobile").val(),
        sponsorMobile: $("#sponsorMobile").val(),
        range_date: $("#range-date").val(),
        limit: p.limit,
        sort: p.sort,
        order: p.order,
        offset: p.offset,
        search: p.search
    };
}
$("#submitForm").on('submit', function(e) {
    $(".waiting").show();

    var isValid = true;
    $("input[required]").each(function() {
        if ($(this).val().trim() === "") {
            $(this).addClass("is-invalid");
            isValid = false;
        } else {
            $(this).removeClass("is-invalid");
        }
    });

    if (!isValid) {
        $(".waiting").hide();
        return;
    }

    const base_url = localStorage.getItem('base_url');
    const url = base_url + "/admin/session/addUser";
    e.preventDefault();
    var data = new FormData(this);
    var sendData = {};
    data.forEach(function(value, key) {
        sendData[key] = value;
    });
    sendData['latitude'] = localStorage.getItem('lat');
    sendData['longitude'] = localStorage.getItem('lng');
    sendData['agent'] = localStorage.getItem('agent');
    // console.log(sendData);
    const response = SendServerRequest(url, sendData);
});
// submitWallet
$("#formUpdareWallet").on('submit', function(e) {
    const base_url = localStorage.getItem('base_url');
    const url = base_url + "/admin/session/manageWallet";
    e.preventDefault();
    var data = new FormData(this);
    var sendData = {};
    data.forEach(function(value, key) {
        if (key === 'txnPin' && !isNaN(value)) {
            value = parseInt(value, 10).toString(36).toUpperCase();
            sendData[key] = value;
        } else {
            sendData[key] = value;
        }

    });
    sendData['latitude'] = localStorage.getItem('lat');
    sendData['longitude'] = localStorage.getItem('lng');
    sendData['agent'] = localStorage.getItem('agent');
    // console.log(sendData);
    const response = SendServerRequest(url, sendData);

});





function checkMobile(value) {

    var mobile = value.replace(/\D/g, '');
    if (mobile.length === 10) {

        const base_url = localStorage.getItem('base_url');
        const url = base_url + '/admin/session/checkUser';
        var sendData = {};
        sendData['mobileNumber'] = mobile;
        sendData['agent'] = localStorage.getItem('agent');
        const response = SendServerRequest(url, sendData);

    } else if (mobile.length > 10) {
        iziToast.show({
            icon: 'fa fa-check',
            color: 'red',
            message: 'Invalid Mobile Number',
            position: 'topCenter',
        });
    }
}

function DeActiveStatus(id) {
    const base_url = localStorage.getItem('base_url');
    const url = base_url + '/admin/session/updateUserField';
    var sendData = {};
    sendData['appID'] = id;
    sendData['fieldName'] = 'userStatus';
    sendData['fieldValue'] = '0';
    sendData['agent'] = localStorage.getItem('agent');
    console.log(sendData);
    confirmData(url, sendData);
    // const response = SendServerRequest(url, sendData);
}

function ActiveStatus(id) {
    const base_url = localStorage.getItem('base_url');
    const url = base_url + '/admin/session/updateUserField';
    var sendData = {};
    sendData['appID'] = id;
    sendData['fieldName'] = 'userStatus';
    sendData['fieldValue'] = '1';
    sendData['agent'] = localStorage.getItem('agent');
    console.log(sendData);
    confirmData(url, sendData);
}

function DeActiveOtp(id) {
    const base_url = localStorage.getItem('base_url');
    const url = base_url + '/admin/session/updateUserField';
    var sendData = {};
    sendData['appID'] = id;
    sendData['fieldName'] = 'loginOTP';
    sendData['fieldValue'] = '0';
    sendData['agent'] = localStorage.getItem('agent');
    console.log(sendData);
    confirmData(url, sendData);
}

function ActiveOtp(id) {
    const base_url = localStorage.getItem('base_url');
    const url = base_url + '/admin/session/updateUserField';
    var sendData = {};
    sendData['appID'] = id;
    sendData['fieldName'] = 'loginOTP';
    sendData['fieldValue'] = '1';
    sendData['agent'] = localStorage.getItem('agent');
    console.log(sendData);
    confirmData(url, sendData);
}

// ManageWallet
function ManageWallet(button) {

    const row = button.closest('tr');
    const cells = row.getElementsByTagName('td');
    let rowData = [];
    for (let i = 1; i < cells.length; i++) {
        rowData.push(cells[i].textContent);
    }
    console.log(rowData);
    form.reset();
    $("#appID").val(rowData[1]);
    $("#UserName").val(rowData[3]);
    $("#MainWallet").val(rowData[5]);
    var modal = new bootstrap.Modal(document.getElementById('updatewallet'));
    modal.show();
}
 </script>
 @endsection