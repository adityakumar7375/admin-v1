<?php

// routes/administrator.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\RechargeController;
use App\Http\Controllers\Administrator\PayoutController;
use App\Http\Controllers\Administrator\MoneyTransaferController;
use App\Http\Controllers\Administrator\AepsController;
use App\Http\Controllers\DashboardController;

Route::post('/save-location', [LoginController::class, 'saveLocation']);
Route::get('/', [LoginController::class, 'index'])->name('/');
Route::get('/setSession/{any}', [LoginController::class, 'setSession'])->name('setSession');
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('request-logout', [LoginController::class, 'request_logout'])->name('request-logout');
// Route::post('submit-otp', [LoginController::class, 'submit_otp'])->name('submit.otp');


Route::middleware('check.session')->group(function () {
    
    Route::get('/dashboard-data', [DashboardController::class, 'dashboard_data'])->name('dashboard.data');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    // user.list
    Route::get('/user/list', [UserController::class, 'index'])->name('user.list');
    // Route::get('/user/sessions', [UserController::class, 'user_sessions_list'])->name('user.sessions');
    Route::get('/user/sessions', [UserController::class, 'user_sessions_list'])->name('user.sessions');
    Route::get('/user/kyc/list', [UserController::class, 'user_kyc_list'])->name('user.kyc.list');
    Route::get('/user/bulk', [UserController::class, 'user_bulk'])->name('user.bulk');

    Route::get('/users/list', [UserController::class, 'list']);






    // RechargeController -------------------------------------------------

    Route::get('/api/list', [RechargeController::class, 'api_list'])->name('api.list');
    Route::get('/api/operators', [RechargeController::class, 'api_operators'])->name('api.operators');
    Route::get('/user/based/switching', [RechargeController::class, 'user_based_switching'])->name('user.based.switching');
    Route::get('/amount/wise/api', [RechargeController::class, 'amount_wise_api'])->name('amount.wise.api');
    Route::get('/amount/rangewiseapi', [RechargeController::class, 'amount_range_wise_api'])->name('amount.range.wise.api');
    Route::get('/circle/based/api', [RechargeController::class, 'circle_based_api'])->name('circle.based.api');
    Route::get('/sponsor/distributor', [RechargeController::class, 'sponsor_distributor'])->name('sponsor.distributor');
    Route::get('/bbps/api', [RechargeController::class, 'bbps_api'])->name('bbps.api');
    Route::get('/back/upapi', [RechargeController::class, 'back_up_api'])->name('back.up.api');


////  PayoutController----------------------------------------------------------

    
    Route::get('/payout/transactions', [PayoutController::class, 'payout_transactions'])->name('payout.transactions');
    Route::get('/payin/transactions', [PayoutController::class, 'payin_transactions'])->name('payin.transactions');
    Route::get('/manage/payout/payin', [PayoutController::class, 'manage_payout_payin'])->name('manage.payout.payin');
    Route::get('/payout/beneficiarylist', [PayoutController::class, 'payout_beneficiary_list'])->name('payout.beneficiary.list');
    Route::get('/payin/settlement', [PayoutController::class, 'payin_transactions_settlement'])->name('payin.transactions.settlement');
    Route::get('/payout/company/accounts', [PayoutController::class, 'payout_company_accounts'])->name('payout.company.accounts');








///  MoneyTransaferController---------------------------------





    Route::get('/dmt/transactions', [MoneyTransaferController::class, 'dmt_transactions'])->name('dmt.transactions');
    Route::get('/manage/dmtapis', [MoneyTransaferController::class, 'manage_dmt_apis'])->name('manage.dmt.apis');
    Route::get('/user/dmt/settings', [MoneyTransaferController::class, 'user_dmt_settings'])->name('user.dmt.settings');
    Route::get('/dmt/banklist', [MoneyTransaferController::class, 'dmt_bank_list'])->name('dmt.bank.list');

///  AepsController-----------------------------------------------------------------------------------------------------


    Route::get('/aeps/transactions', [AepsController::class, 'aeps_transactions'])->name('aeps.transactions');
    Route::get('/aeps/banklist', [AepsController::class, 'aeps_bank_list'])->name('aeps.bank.list');
    Route::get('/aeps/device/list', [AepsController::class, 'aeps_device_list'])->name('aeps.device.list');
    Route::get('/aeps/settings', [AepsController::class, 'wise_aeps_settings'])->name('wise.aeps.settings');


    
});