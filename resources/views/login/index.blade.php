 @extends('login.layout.layout')
 @section('content')
 @php $webData = Cache::get('web'); @endphp
 <style>
.iimg {
    background-size: 50% !important;
    background-position: center center !important;
    display: block !important;
    background-repeat: no-repeat !important;
}
 </style>
 <div class="row">
     <div class="col-xl-7 iimg" style="">
         <img class="bg-img-cover bg-center-" src="{{@$webData['data']['logoSmall']}}" alt="looginpage" style="">
     </div>
     <div class="col-xl-5  p-0">
         <div class="login-card log1 login-dark">
             <div>
                 <!-- {{@$webData['data']['logoImage']}} -->
                 <div><a class="logo text-start" href="return:false"><img class=" for-light"
                             src="{{@$webData['data']['logoImage']}}" height="50" alt="looginpage"><img
                             class=" for-dark" src="{{@$webData['data']['logoImage']}}" height="50"
                             alt="looginpage"></a>
                 </div>
                 <div class="login-main">
                     <form action="return:false" method="post" class="row g-3" id="submitForm">
                         <h3>{{@$webData['data']['companyName']}}</h3>
                         <h4>Sign in to account</h4>
                         <p>Enter your mobile & password to login</p>
                         <div class="form-group">
                             <label class="col-form-label">Mobile Number</label>
                             <input class="form-control" type="number" required="" name="mobile" id="mobile_data"
                                 placeholder="9876543210" value="9412591166">
                         </div>
                         <div class="form-group">
                             <label class="col-form-label">Password</label>
                             <div class="form-input position-relative">
                                 <input class="form-control" type="password" name="password" required=""
                                     placeholder="*********" value="9807544556">
                                 <div class="show-hide"><span class="show"> </span></div>
                             </div>
                         </div>
                         <div class="form-group mb-0">
                             <div class="checkbox p-0">
                                 <input id="checkbox1" type="checkbox">
                                 <label class="text-muted" for="checkbox1">Remember password</label>
                             </div>
                             <button class="btn btn-primary btn-block w-100" type="submit"
                                 id="btnSubmit">Submit</button>
                         </div>

                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @endsection