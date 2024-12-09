<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Services\ApiService;
use App\Services\CacheService;

class PayoutController extends Controller
{
    
    protected $apiService;
    protected $cacheService;

    public function __construct(ApiService $apiService,CacheService $cacheService)
    {
        $this->apiService = $apiService;
        $this->cacheService = $cacheService;
        $this->middleware('check.session');
        if (!session('user') || !session('userToken')) {
            return redirect()->route('login');
        }

       
    }
    
    public function payout_transactions(Request $request){
        $this->cacheImageUrlIfNeeded();
        $webData=$this->apiService->getMethod('/common/getBankList');
        if($webData['errorCode']==200){
            $data['bank']=$webData['data'];
            return view('user.payout.transactions',$data);
        }else{
            return redirect()->route('dashboard');
        }
    }
    public function transactions_list(Request $request)
    {

        $val=$request->all();
        $start='';
        $end='';
        if(!empty($val['range_date'])){
            $as=explode(" to ",$val['range_date']);
            $start=$as[0];
            $end=$as[1];
        }
        $senddata = [
            'latitude'=>$this->cacheService->get('latitude'),
            'longitude'=>$this->cacheService->get('longitude'),
            'agent'=>$this->cacheService->get('agent'),
            'count'=>$val['limit']??10,
            'offset'=>$val['offset']??0,
            "accountNumber"=>$val['accountNumber']??'',
            "orderID"=>$val['orderID']??'',
            "bankID"=>$val['bankID']??'',// from banklist API
            "fromDate"=>$start,// date_format:Y-m-d
            "toDate"=>$end,//should be greater than fromDate
            "txnStatus"=>$val['txnStatus']??'',// all,success,pending,failed
            "appID"=>$val['appID']??'', // userID search by checkuser api
            "apiRefID"=>$val['apiRefID']??''
        ];
        $webData = $this->apiService->GetDataApi('/session/payoutTransactions',$senddata,session('userToken'));

        
        $total=$webData['data']['count'];
        $bulkData = array();
        $bulkData['total'] = $total;
        $listData = array();
        $tempRow = array();
        $i=0;
        if($total>0){
            foreach($webData['data']['records'] as $rows){
                $listData[] = $rows;
            }
        }

        $bulkData['rows'] = $listData;   
        // return (json_encode($bulkData));
        return response()->json($bulkData);

    
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




        private function cacheImageUrlIfNeeded()
        {
            if (empty(Cache::get('img_url'))) {
                $webData = $this->apiService->getWebsiteDetails('access/getWebsiteDetails');
                $this->cacheService->set('web', $webData, 60 * 6);
                $img_url = $webData['data']['baseUrl'] . '/storage/uploads/images/';
                $this->cacheService->set('img_url', $img_url);
            }
        }








    
}