<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherreportsController extends Controller
{
   




    
    public function system_wallet_summary(Request $request){
        return view('user.other.summary');
     }


    
    public function user_wise_wallet(Request $request){
        return view('user.other.wallet');
     }


    
    public function sent_sms_report(Request $request){
        return view('user.other.report');
     }


    
    public function manage_sms_apis(Request $request){
        return view('user.other.apis');
     }



    
    public function manage_sms_templates(Request $request){
        return view('user.other.templates');
     }


    
    public function dispute_report(Request $request){
        return view('user.other.disputereport');
     }






















}
