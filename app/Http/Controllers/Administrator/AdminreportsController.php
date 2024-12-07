<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminreportsController extends Controller
{
   


    
    public function payment_summary(Request $request){
        return view('user.reports.summary');
     }



    public function api_dmtsummary(Request $request){
        return view('user.reports.dmtsummary');
     }



    public function api_aepssummary(Request $request){
        return view('user.reports.aepssummary');
     }





    public function api_payout(Request $request){
        return view('user.reports.payout');
     }




    public function use_walletsummary(Request $request){
        return view('user.reports.walletsummary');
     }




    public function utility_paymentsummary(Request $request){
        return view('user.reports.paymentsummary');
     }





    public function user_wisedmt(Request $request){
        return view('user.reports.wisedmt');
     }



    public function user_wiseaeps(Request $request){
        return view('user.reports.wiseaeps');
     }



    public function user_wisepayout(Request $request){
        return view('user.reports.wisepayout');
     }




    public function user_payinsummary(Request $request){
        return view('user.reports.payinsummary');
     }




    public function user_booksummary(Request $request){
        return view('user.reports.booksummary');
     }
















}
