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
}
 </style>
 <div class="row">
     <div class="col-xl-12 col-md-12 proorder-md-4">
         <div class="card">
             <div class="card-header">
                 <h4>Session List</h4>
             </div>
             <div class="card-body pt-0 assignments-table px-0">
                 <div class="table-responsive theme-scrollbar p-3 pb-0 pt-0">
                     <!-- <table class="table display" id="assignments-table" style="width:100%"> -->
                     <table class="table-striped  " data-toggle="table" data-url="/users/getSessionList"
                         data-click-to-select="true" data-side-pagination="server" data-pagination="true"
                         data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false" data-show-columns="true"
                         data-show-refresh="true" data-trim-on-search="false" data-sort-name="id" data-sort-order="desc"
                         data-mobile-responsive="true" data-toolbar="" data-show-export="false" data-page-size="5"
                         data-maintain-selected="true" data-export-types='["txt","excel"]'
                         data-query-params="sessionQueryParams">
                         <thead>
                             <tr>
                                 <th data-field="action">Action</th>

                                 <th data-field="userID" style="text-align:center">User ID</th>
                                 <th data-field="userName">User Name</th>
                                 <th data-field="userMobile">User Mobile</th>
                                 <th data-field="SessionID">Session ID</th>
                                 <th data-field="userIP">userIP</th>
                                 <th data-field="userLatLong">userLatLong</th>
                                 <th data-field="is_active">is Active</th>
                                 <th data-field="loginMode">login Mode</th>
                                 <th data-field="loginAgent">loginAgent</th>
                                 <th data-field="logoutVia">logoutVia</th>
                                 <th data-field="logoutAgent">logoutAgent</th>
                                 <th data-field="created_at"> Created At</th>
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