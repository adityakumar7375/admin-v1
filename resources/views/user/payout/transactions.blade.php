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

             <div class="card-header ">
                 <div class="row">
                     <div class="col-sm-12">
                         <h4>Transactions List</h4>
                     </div>

                     <div class="col-sm-3">
                         <select class="form-select select2" id="bankID">
                             <option selected="" disabled="" value="">Select Bank</option>
                             @foreach($bank as $list)
                             <option value="{{$list['bankId']}}">{{$list['bankName']}}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="col-sm-3">
                         <select class="form-select select2" id="txnStatus">
                             <option selected="" disabled="" value="">Select Status</option>
                             <option>all</option>
                             <option>success</option>
                             <option>pending</option>
                             <option>failed</option>
                         </select>
                     </div>

                     <div class="col-sm-3">
                         <input class="form-control" id="accountNumber" type="number" placeholder="Account Number">
                     </div>
                     <div class="col-sm-3">
                         <input class="form-control" id="orderID" type="text" placeholder="Order ID">
                     </div>
                     <div class="col-sm-3">
                         <input class="form-control" id="apiRefID" type="text" placeholder="apiRef ID">
                     </div>
                     <div class="col-sm-3">
                         <div class="input-group flatpicker-calender">
                             <input class="form-control" id="range-date" type="date" placeholder="Select Date">
                         </div>
                     </div>


                     <div class="col-sm-6 mt-3 text-right text-end">
                         <button class="btn btn-sm btn-primary" onclick="FilterData()">Filter</button>
                         <button class="btn btn-sm btn-danger" onclick="FilterClearData()">Clear</button>
                     </div>
                 </div>
             </div>

             <div class="card-body pt-0   px-0">
                 <div class="table-responsive theme-scrollbar p-3 pb-0 pt-0">
                     <!-- <table class="table display" id="assignments-table" style="width:100%"> -->
                     <table class="table-striped  " data-toggle="table" data-url="/payout/transactions-list"
                         data-click-to-select="true" data-side-pagination="server" data-pagination="true"
                         data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false" data-show-columns="true"
                         data-show-refresh="true" data-trim-on-search="false" data-sort-name="id" data-sort-order="desc"
                         data-mobile-responsive="true" data-toolbar="" data-show-export="false" data-page-size="10"
                         data-maintain-selected="true" data-export-types='["txt","excel"]'
                         data-query-params="transactionsQueryParams">
                         <thead>
                             <tr>
                                 <!-- <th data-field="action">Action</th> -->
                                 <th data-field="bankLogo">BankLogo</th>
                                 <th data-field="userID">User ID</th>
                                 <th data-field="userName">User Name</th>
                                 <th data-field="bankName">bank Name</th>
                                 <th data-field="sponsorID">sponsorID</th>
                                 <th data-field="orderID">orderID</th>
                                 <th data-field="apiUserRefID">apiUserRefID</th>
                                 <th data-field="beneID">beneID</th>
                                 <th data-field="accountNumber">accountNumber</th>
                                 <th data-field="accountHolderName">accountHolderName</th>
                                 <th data-field="amount">amount</th>
                                 <th data-field="ifsc">ifsc</th>
                                 <th data-field="txnStatus">txnStatus</th>
                                 <th data-field="transferMode">transferMode</th>
                                 <th data-field="utr">utr</th>
                                 <th data-field="oBal">oBal</th>
                                 <th data-field="cBal">cBal</th>
                                 <th data-field="message">message</th>
                                 <th data-field="charges">charges</th>
                                 <th data-field="isRefunded">isRefunded</th>
                                 <th data-field="dot">dot</th>
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


 @section('script')
 <script>
function FilterClearData() {
    $('.table-striped').bootstrapTable('refresh');
    $("#bankID").val('');
    $("#accountNumber").val('');
    $("#orderID").val('');
    $("#txnStatus").val('');
    $("#appID").val('');
    $("#apiRefID").val('');
    $("#range-date").val('');
}

function transactionsQueryParams(p) {
    return {
        bankID: $("#bankID").val(),
        accountNumber: $("#accountNumber").val(),
        orderID: $("#orderID").val(),
        txnStatus: $("#txnStatus").val(),
        appID: $("#appID").val(),
        apiRefID: $("#apiRefID").val(),
        range_date: $("#range-date").val(),
        limit: p.limit,
        sort: p.sort,
        order: p.order,
        offset: p.offset,
        search: p.search
    };
}
 </script>
 @endsection