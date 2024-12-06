<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AepsController extends Controller
{
    

    
         public function aeps_transactions(Request $request){
             return view('user.aeps.transactions');
          }


         public function aeps_bank_list(Request $request){
             return view('user.aeps.banklist');
          }


         public function aeps_device_list(Request $request){
             return view('user.aeps.devicelist');
          }

         public function wise_aeps_settings(Request $request){
             return view('user.aeps.settings');
          }



















}