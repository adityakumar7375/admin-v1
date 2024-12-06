<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    //
    

      public function api_list(Request $request){
         return view('user.recharge.apilist');
    }


      public function api_operators(Request $request){
         return view('user.recharge.operators');
    }



      public function user_based_switching(Request $request){
         return view('user.recharge.switching');
    }



      public function amount_wise_api(Request $request){
         return view('user.recharge.api');
    }


    

      public function amount_range_wise_api(Request $request){
         return view('user.recharge.rangewiseapi');
    }



      public function circle_based_api(Request $request){
         return view('user.recharge.circle');
    }



      public function sponsor_distributor(Request $request){
         return view('user.recharge.distributor');
    }





      public function bbps_api(Request $request){
         return view('user.recharge.bbps');
    }




      public function back_up_api(Request $request){
         return view('user.recharge.upapi');
    }






    
}