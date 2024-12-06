 @extends('login.layout.layout')
 @section('content')
 @php

 $webData = Cache::get('web');
 @endphp




 <div class="row">
     <div class="col-xl-7 b-center bg-size"
         style="background-image: url(&quot;{{url('/ui/')}}/assets/images/login/2.jpg&quot;); background-size: cover; background-position: center center; display: block;">
         <img class="bg-img-cover bg-center" src="{{url('/ui/')}}/assets/images/login/2.jpg" alt="Img Not Found"
             style="display: none;">
     </div>
     <div class="col-xl-5 p-0">
         @if (session('message'))
         <div class="alert alert-error">
             {{ session('message') }}
         </div>
         @endif

         <div class="login-card login-dark">
             <div>
                 <div><a class="logo text-start" href="/"><img class="img-fluid for-light"
                             src="{{Cache::get('img_url').'/'.$webData['data']['logoImage']}}" alt="Img Not Found"><img
                             class="img-fluid for-dark"
                             src="{{Cache::get('img_url').'/'.$webData['data']['logoImage']}}" alt="Img Not Found"></a>
                 </div>
                 <div class="login-main">
                     <form action="return:false" method="post" class="theme-form" id="submitForm">
                         <h4>Sign in to account</h4>
                         <p>Enter your email &amp; password to login</p>
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
                                 <!-- <div class="show-hide"><span class="show"> </span></div> -->
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
                         <h6 class="text-muted mt-4 or">Social media handles</h6>
                         <div class="social mt-4">
                             <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login"
                                     target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-linkedin txt-linkedin">
                                         <path
                                             d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                         </path>
                                         <rect x="2" y="9" width="4" height="12"></rect>
                                         <circle cx="4" cy="4" r="2"></circle>
                                     </svg> LinkedIn </a><a class="btn btn-light"
                                     href="https://twitter.com/login?lang=en" target="_blank"><svg
                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-twitter txt-twitter">
                                         <path
                                             d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                         </path>
                                     </svg>twitter</a><a class="btn btn-light" href="https://www.facebook.com/"
                                     target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-facebook txt-fb">
                                         <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                         </path>
                                     </svg>facebook</a></div>
                         </div>

                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @endsection