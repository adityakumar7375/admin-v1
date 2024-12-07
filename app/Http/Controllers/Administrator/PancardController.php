<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PancardController extends Controller
{
    



    public function cms_transactions(Request $request){
        return view('user.pancard.transactions');
     }


    public function pan_card_requests(Request $request){
        return view('user.pancard.requests');
     }


    public function pan_coupon_requests(Request $request){
        return view('user.pancard.coupon');
     }


    public function available_pan_coupons(Request $request){
        return view('user.pancard.pancoupons');
     }











}
