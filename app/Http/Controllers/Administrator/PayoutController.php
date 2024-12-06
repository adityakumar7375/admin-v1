<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayoutController extends Controller
{
    

    
         public function payout_transactions(Request $request){
         return view('user.payout.transactions');
    }






         public function payin_transactions(Request $request){
             return view('user.payout.payin');
          }




         public function manage_payout_payin(Request $request){
             return view('user.payout.managepayout');
          }




         public function payout_beneficiary_list(Request $request){
             return view('user.payout.beneficiarylist');
          }




         public function payin_transactions_settlement(Request $request){
             return view('user.payout.settlement');
          }



         public function payout_company_accounts(Request $request){
             return view('user.payout.accounts');
          }













    
}