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

class UserController extends Controller
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
    public function index()
    {
        $this->cacheImageUrlIfNeeded();
        $senddata = [
            'latitude'=>$this->cacheService->get('latitude'),
            'longitude'=>$this->cacheService->get('longitude'),
            'agent'=>$this->cacheService->get('agent')
        ];
        $stateData = $this->apiService->getMethod('/common/getStateList');
      
        $webData = $this->apiService->GetMethodDataApi('/session/getUserListFilterData',$senddata,session('userToken'));
        if($webData['errorCode']==400){
            $data['data']=$webData['data'];
            $data['state']=$stateData['data'];
            return view('user.users.index',$data);
        }else{
            return redirect()->route('dashboard');
        }
        
    }
    
    public function list(Request $request)
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
            'mobileNumber' =>$val['filter_mobile']??'',
            'count'=>$val['limit'],
            'userRole'=>$val['role_filter']??'',
            'sponsorMobile'=>$val['sponsorMobile']??'',
            'startDate'=>$start,
            'endDate'=>$end,
            'accountStatus'=>$val['status_filter']??'',
            'offset'=>$val['offset']
        ];
        $webData = $this->apiService->GetDataApi('/session/getUserList',$senddata,session('userToken'));
        
        $total=$webData['data']['count']??'0';
        $bulkData = array();
        $bulkData['total'] = $total;
        $listData = array();
        $tempRow = array();
        $i=0;
        if($total>0){
            
            foreach($webData['data']['records'] as $rows){
                $tempRow['id'] = $i++;
                $tempRow['action'] = '
                    <div class="dropdown icon-dropdown">
                         <button class="btn dropdown-toggle" id="userdropdown'.$i.'" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false">
                             <i class="icon-more-alt"></i>
                         </button>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown'.$i.'">
                             <a class="dropdown-item" href="#">Edit User </a>
                             <a class="dropdown-item" href="#" onclick="ManageWallet(this)" >Manage Wallet</a>
                             <a class="dropdown-item" href="#">Manage Commission Scheme</a>
                             <a class="dropdown-item" href="#">View Kyc</a>
                         </div>
                    </div>
                ';
                $tempRow['userID'] = $rows['userID'];
                $tempRow['userName'] = $rows['userName'];
                $tempRow['userMobile'] = $rows['userMobile'];
                $tempRow['userEmail'] = $rows['userEmail'];
                $tempRow['mainWallet'] = '₹'.$rows['mainWallet'];
                $tempRow['settlementBalance'] = '₹'.$rows['settlementBalance'];
                $tempRow['virtualBalance'] = '₹'.$rows['virtualBalance'];
                $tempRow['cashBackBalance'] = '₹'.$rows['cashBackBalance'];
                // $tempRow['status'] = $rows['status'];
                if($rows['status']==true){
                    $tempRow['status'] = '
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input switch-success check-size" onchange="DeActiveStatus('.$rows['userID'].')" type="checkbox" role="switch" checked="">
                    </div>
                    ';
                }else{
                    $tempRow['status'] = '
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input switch-warning check-size" onchange="ActiveStatus('.$rows['userID'].')"  type="checkbox" role="switch" >
                    </div>
                    ';
                }
                
                $tempRow['profileImage'] = '<img src="'.Cache::get('img_url').'/'.$rows['profileImage'].'" height="50" />';
                $tempRow['is_kyc'] = $rows['is_kyc'];
               

                if($rows['is_otp']==true){
                    $tempRow['is_otp'] ='
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input switch-success check-size" onchange="DeActiveOtp('.$rows['userID'].')"  type="checkbox" role="switch" checked="">
                    </div>
                    ';
                }else{
                    $tempRow['is_otp'] ='
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input switch-warning check-size" onchange="DeActiveOtp('.$rows['userID'].')"  type="checkbox" role="switch" >
                    </div>
                    ';
                }

                


                $tempRow['sponsorName'] = $rows['sponsorName'];
                $tempRow['distributorName'] = $rows['distributorName'];
                $tempRow['masterDistName'] = $rows['masterDistName'];
                $tempRow['role'] = $rows['role'];
                $tempRow['userCreatedAt'] = $rows['userCreatedAt'];
                $listData[] = $tempRow;
            }
        }

        $bulkData['rows'] = $listData;   
        // return (json_encode($bulkData));
        return response()->json($bulkData);

    
    }


    // start getSessionList

    
    public function getSessionList(Request $request)
    {

        $val=$request->all();

        $senddata = [
            'latitude'=>$this->cacheService->get('latitude'),
            'longitude'=>$this->cacheService->get('longitude'),
            'agent'=>$this->cacheService->get('agent'),
            'userMobile' =>$val['filter_mobile']??'',
            'count'=>$val['limit'],
            'parentMobile'=>$val['parentMobile']??'',
            'loginMode'=>$val['loginMode']??'',
            'sessionStatus'=>"",
            'accountStatus'=>$val['status_filter']??'',
            'offset'=>$val['offset']
        ];
        $webData = $this->apiService->GetDataApi('/session/getSessionList',$senddata,session('userToken'));

        
        $total=$webData['data']['count'];
        $bulkData = array();
        $bulkData['total'] = $total;
        $listData = array();
        $tempRow = array();
        $i=0;
        if($total>0){
            
            foreach($webData['data']['records'] as $rows){
                $tempRow['id'] = $i++;
                
                $tempRow['action'] = '
                    <div class="dropdown icon-dropdown">
                         <button class="btn dropdown-toggle" id="userdropdown'.$i.'" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false">
                             <i class="icon-more-alt"></i>
                         </button>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown'.$i.'">
                             <a class="dropdown-item" href="#" onclick="getRowData(this)">Delete User </a>
                         </div>
                    </div>
                ';
                $tempRow['userID'] = $rows['UserID'];
                $tempRow['userName'] = $rows['userName'];
                $tempRow['userMobile'] = $rows['userMobile'];
                $tempRow['SessionID'] = $rows['SessionID'];
                $tempRow['userIP'] = $rows['userIP'];
                $tempRow['userLatLong'] = $rows['userLatLong'];
                $tempRow['loginMode'] = $rows['loginMode'];
                // $tempRow['status'] = $rows['status'];
                if($rows['is_active']==true){
                    $tempRow['is_active'] = '
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input switch-success check-size"  type="checkbox" role="switch" checked="">
                    </div>
                    ';
                }else{
                    $tempRow['is_active'] = '
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input switch-warning check-size" type="checkbox" role="switch" >
                    </div>
                    ';
                }
                
                $tempRow['loginAgent'] = $rows['loginAgent'];
                $tempRow['logoutVia'] = $rows['logoutVia'];
        
                $tempRow['logoutAgent'] = $rows['logoutAgent'];
                $tempRow['created_at'] = $rows['created_at'];
                $listData[] = $tempRow;
            }
        }

        $bulkData['rows'] = $listData;   
        // return (json_encode($bulkData));
        return response()->json($bulkData);

    
    }




















    // end getSessionList



    public function user_sessions_list(Request $request){
         return view('user.users.user-sessions-list');
    }

    public function user_kyc_list(Request $request){
         return view('user.users.kyc');
    }

    public function user_bulk(Request $request){
         return view('user.users.bulk');
    }



    public function show($id)
    {
        return view('user.users.show', compact('id'));
    }

    public function store(Request $request)
    {
        // Logic to store a new user
    }

    public function update(Request $request, $id)
    {
        // Logic to update user details
    }

    public function destroy($id)
    {
        // Logic to delete a user
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