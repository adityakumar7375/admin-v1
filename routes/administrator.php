<?php

// routes/administrator.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\RechargeController;
use App\Http\Controllers\Administrator\PayoutController;
use App\Http\Controllers\Administrator\MoneyTransaferController;
use App\Http\Controllers\Administrator\AepsController;
use App\Http\Controllers\Administrator\PancardController;
use App\Http\Controllers\Administrator\AdminreportsController;
use App\Http\Controllers\Administrator\WalletmanagementController;
use App\Http\Controllers\Administrator\SettingsController;
use App\Http\Controllers\Administrator\OtherreportsController;
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
    Route::get('/users/getSessionList', [UserController::class, 'getSessionList']);






    // RechargeController -------------------------------------------------

    Route::get('/api/list', [RechargeController::class, 'api_list'])->name('api.list');
    Route::get('/api/operators', [RechargeController::class, 'api_operators'])->name('api.operators');
    Route::get('/user/based/switching', [RechargeController::class, 'user_based_switching'])->name('user.based.switching');
    Route::get('/amount/wise/api', [RechargeController::class, 'amount_wise_api'])->name('amount.wise.api');
    Route::get('/amount/rangewiseapi', [RechargeController::class, 'amount_range_wise_api'])->name('amount.range.wise.api');
    Route::get('/circle/based/api', [RechargeController::class, 'circle_based_api'])->name('circle.based.api');
    Route::get('/sponsor/distributor', [RechargeController::class, 'sponsor_distributor'])->name('sponsor.distributor');
    Route::get('/bbps/api', [RechargeController::class, 'bbps_api'])->name('bbps.api');
    Route::get('/backupapi', [RechargeController::class, 'back_up_api'])->name('back.up.api');


////  PayoutController----------------------------------------------------------

    
    Route::get('/payout/transactions', [PayoutController::class, 'payout_transactions'])->name('payout.transactions');
    Route::get('/payout/transactions-list', [PayoutController::class, 'transactions_list'])->name('payout.transactions-list');
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
    Route::get('/dmt/customer/list', [MoneyTransaferController::class, 'dmt_customer_list'])->name('dmt.customer.list');

///  AepsController-----------------------------------------------------------------------------------------------------


    Route::get('/aeps/transactions', [AepsController::class, 'aeps_transactions'])->name('aeps.transactions');
    Route::get('/aeps/banklist', [AepsController::class, 'aeps_bank_list'])->name('aeps.bank.list');
    Route::get('/aeps/device/list', [AepsController::class, 'aeps_device_list'])->name('aeps.device.list');
    Route::get('/aeps/settings', [AepsController::class, 'wise_aeps_settings'])->name('wise.aeps.settings');


// PancardController--------------------------------------------------------------------------------------



Route::get('/cms/transactions', [PancardController::class, 'cms_transactions'])->name('cms.transactions');
Route::get('/pancard/requests', [PancardController::class, 'pan_card_requests'])->name('pan.card.requests');
Route::get('/pan/coupon', [PancardController::class, 'pan_coupon_requests'])->name('pan.coupon.requests');
Route::get('/available/pancoupons', [PancardController::class, 'available_pan_coupons'])->name('available.pan.coupons');



//  AdminreportsController----------------------- 



Route::get('/payment/summary', [AdminreportsController::class, 'payment_summary'])->name('payment.summary');
Route::get('/api/dmtsummary', [AdminreportsController::class, 'api_dmtsummary'])->name('api.dmtsummary');
Route::get('/api/aepssummary', [AdminreportsController::class, 'api_aepssummary'])->name('api.aepssummary');
Route::get('/api/payout', [AdminreportsController::class, 'api_payout'])->name('api.payout');
Route::get('/use/walletsummary', [AdminreportsController::class, 'use_walletsummary'])->name('use.walletsummary');
Route::get('/utility/paymentsummary', [AdminreportsController::class, 'utility_paymentsummary'])->name('utility.paymentsummary');
Route::get('/user/wisedmt', [AdminreportsController::class, 'user_wisedmt'])->name('user.wisedmt');
Route::get('/user/wiseaeps', [AdminreportsController::class, 'user_wiseaeps'])->name('user.wiseaeps');
Route::get('/user/wisepayout', [AdminreportsController::class, 'user_wisepayout'])->name('user.wisepayout');
Route::get('/user/payinsummary', [AdminreportsController::class, 'user_payinsummary'])->name('user.payinsummary');
Route::get('/user/booksummary', [AdminreportsController::class, 'user_booksummary'])->name('user.booksummary');















////WalletmanagementController -------------


Route::get('/manage/userwallet', [WalletmanagementController::class, 'manage_user_wallet'])->name('manage.user.wallet');
Route::get('/pending/walletrequests', [WalletmanagementController::class, 'pending_wallet_requests'])->name('pending.wallet.requests');
Route::get('/previous/wallet/requests', [WalletmanagementController::class, 'previous_wallet_requests'])->name('previous.wallet.requests');
Route::get('/company/bankaccounts', [WalletmanagementController::class, 'company_bank_accounts'])->name('company.bank.accounts');
Route::get('/reseller/bank/accounts', [WalletmanagementController::class, 'reseller_bank_accounts'])->name('reseller.bank.accounts');
Route::get('/manage/systemwallet', [WalletmanagementController::class, 'manage_system_wallet'])->name('manage.system.wallet');




///SettingsController



Route::get('/payout/payinsettings', [SettingsController::class, 'payout_payin_settings'])->name('payout.payin.settings');
Route::get('/dmt/settings', [SettingsController::class, 'dmt_settings'])->name('dmt.settings');
Route::get('/recharge/bbps', [SettingsController::class, 'recharge_bbps'])->name('recharge.bbps');
Route::get('/systemsettings', [SettingsController::class, 'system_settings'])->name('system.settings');
Route::get('/manage/commission/scheme', [SettingsController::class, 'manage_commission_scheme'])->name('manage.commission.scheme');
Route::get('/reseller/commissionschemes', [SettingsController::class, 'reseller_commission_schemes'])->name('reseller.commission.schemes');




// OtherreportsController---------------------------------------------------------------------------------------------------


Route::get('/system/wallet/summary', [OtherreportsController::class, 'system_wallet_summary'])->name('system.wallet.summary');
Route::get('/user/wise/wallet', [OtherreportsController::class, 'user_wise_wallet'])->name('user.wise.wallet');
Route::get('/sent/sms/report', [OtherreportsController::class, 'sent_sms_report'])->name('sent.sms.report');
Route::get('/manage/sms/apis', [OtherreportsController::class, 'manage_sms_apis'])->name('manage.sms.apis');
Route::get('/manage/sms/templates', [OtherreportsController::class, 'manage_sms_templates'])->name('manage.sms.templates');
Route::get('/disputereport', [OtherreportsController::class, 'dispute_report'])->name('dispute.report');







    
});