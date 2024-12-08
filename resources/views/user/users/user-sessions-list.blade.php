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


 @section('model')
 <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="loginError" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content ">

             <div class="modal-header">
                 <h5 class="modal-title" id="logoutModalLabel">Warning</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="modal-toggle-wrapper text-center">
                     <ul class="modal-img">
                         <li> <img src="{{asset('/ui')}}/assets/images/gif/danger.gif" alt="alarm"></li>
                     </ul>
                     <h4> Are you sure?</h4>
                     <p>You won't be able to revert this!</p>

                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button class="btn btn-danger" id="logout_request" type="button">Delete</button>
             </div>

         </div>
     </div>
 </div>
 @endsection




 @section('script')
 <script>
function sessionQueryParams(p) {
    return {

        limit: p.limit,
        sort: p.sort,
        order: p.order,
        offset: p.offset,
        search: p.search
    };
}

function getRowData(button) {
    const row = button.closest('tr');
    const cells = row.getElementsByTagName('td');
    let rowData = [];
    for (let i = 1; i < cells.length; i++) {
        rowData.push(cells[i].textContent);
    }
    console.log(rowData);
    var modal = new bootstrap.Modal(document.getElementById('delete'));
    modal.show();
}
 </script>

 @endsection