<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletmanagementController extends Controller
{

    
    public function manage_user_wallet(Request $request){
        return view('user.wallet.userwallet');
     }


    
    public function manage_system_wallet(Request $request){
        return view('user.wallet.systemwallet');
     }




    
    public function pending_wallet_requests(Request $request){
        return view('user.wallet.walletrequests');
     }


    
    public function previous_wallet_requests(Request $request){
        return view('user.wallet.requests');
     }


    public function company_bank_accounts(Request $request){
        return view('user.wallet.bankaccounts');
     }



    public function reseller_bank_accounts(Request $request){
        return view('user.wallet.accounts');
     }







}
