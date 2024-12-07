<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoneyTransaferController extends Controller
{
    


    

         public function dmt_transactions(Request $request){
             return view('user.money.transactions');
          }



    

         public function manage_dmt_apis(Request $request){
             return view('user.money.dmtapis');
          }



         public function user_dmt_settings(Request $request){
             return view('user.money.settings');
          }



         public function dmt_bank_list(Request $request){
             return view('user.money.banklist');
          }




         public function dmt_customer_list(Request $request){
             return view('user.money.list');
          }















}