<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    
    
    public function payout_payin_settings(Request $request){
        return view('user.settings.payinsettings');
     }


    public function dmt_settings(Request $request){
        return view('user.settings.settings');
     }

    public function recharge_bbps(Request $request){
        return view('user.settings.bbps');
     }



    public function system_settings(Request $request){
        return view('user.settings.systemsettings');
     }





    public function manage_commission_scheme(Request $request){
        return view('user.settings.scheme');
     }




    public function reseller_commission_schemes(Request $request){
        return view('user.settings.commissionschemes');
     }













}
