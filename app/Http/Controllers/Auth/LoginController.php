<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Services\ApiService;
use App\Services\CacheService;

class LoginController extends Controller
{

    protected $apiService;
    protected $cacheService;

    public function __construct(ApiService $apiService,CacheService $cacheService)
    {
        $this->apiService = $apiService;
        $this->cacheService = $cacheService;
    }

    public function saveLocation(Request $request){
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'agent' => 'required',
        ]);
        $this->cacheService->set('latitude',$validated['latitude'], 1200);
        $this->cacheService->set('longitude',$validated['longitude'], 1200);
        $this->cacheService->set('agent',$validated['agent'], 1200);
    }
    
    public function index(Request $request)
    {

        if (session('user') || session('userToken')) {
            return redirect()->route('dashboard');
        }
        // $webData = $this->cacheService->get('web');
        // if ($webData) {
        //     $data['web']=$webData;
        // } else {
        //     $webData = $this->apiService->getWebsiteDetails('access/getWebsiteDetails');
        //     $this->cacheService->set('web',$webData, 1200);
        //     $data['web']=$webData;
        // }

        $webData = $this->apiService->getWebsiteDetails('access/getWebsiteDetails');
        $this->cacheService->set('web',$webData, 60*6);
        $img_url=$webData['data']['baseUrl'].'/storage/uploads/images/';
        $this->cacheService->set('img_url',$img_url);

       
        $data['web']=$webData; 
        // var_dump($data['web']);
        // die;
    
        if(@$data['web']['errorCode']==200){
            $this->cacheService->set('baseUrl',$data['web']['data']['baseUrl'],1200);
            return view('login.index');
        }else{
            $this->cacheService->delete('web');
        }
        abort(500, 'Something went wrong!');
    }

    // Handle the login attempt
    public function login(Request $request)
    {

		if($request->isMethod('post')) {

            $data = $request->only('mobile', 'password');
            $validator = Validator::make($data, [
                'mobile' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => true, 'model'=>'close','icon' => 'fas fa-exclamation-triangle', 'color' => 'red', 'reditect' => false, 'msg' => 'Enter valid mobile and password.']);
            }

            $senddata = ['latitude'=>$this->cacheService->get('latitude'),'longitude'=>$this->cacheService->get('longitude'),'mobile' => $request->mobile, 'password' => $request->password];


			if ($senddata) {
                
                $webData = $this->apiService->sendPostReq('/access/login',$senddata);
                $result= json_decode($webData);
                $this->cacheService->set('data',$webData,4500);
                if($result->errorCode==400){
                    return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==404){
                    return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==301){
                    return response()->json(['error' => true,'model'=>'open', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==202){
                    $this->cacheService->set('login_otp','true');
                    $this->cacheService->set('otp_token',$result->data->token);
                    $this->cacheService->set('otp_mobile',$request->mobile);
                    return response()->json(['error' => true,'model'=>'close','otp'=>'open', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==200){
                    session(['userToken' =>$result->data->userToken]);
                    session(['user' =>$result->data]);
                    $this->cacheService->delete('otp_token');
                    $this->cacheService->delete('otp_mobile');
                    return response()->json(['error' => true,'model'=>'close','otp'=>'close', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => true, 'wayOfRedirect' => 'redirect', 'location' =>'dashboard', 'msg' =>$result->message]);
                }
                // var_dump($result);
                // die;
				return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' => 'Logged in Successfully.'.json_encode($webData)]);
			} else {
				return response()->json(['error' => true,'model'=>'close', 'icon' => 'fas fa-exclamation-triangle', 'color' => 'red', 'reditect' => false, 'msg' => 'Invalid Email or Password.']);
			}
		}else{
            return response()->json(['error' => true,'model'=>'close', 'icon' => 'fas fa-exclamation-triangle', 'color' => 'red', 'reditect' => false, 'msg' => 'Something went wrong.']);
        }
    }



    public function request_logout(Request $request){
        $data = $request->only('mobile');
        $validator = Validator::make($data, [
            'mobile' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'model'=>'close','icon' => 'fas fa-exclamation-triangle', 'color' => 'red', 'reditect' => false, 'msg' => 'Enter valid mobile and password.']);
        }
        $senddata = ['userIP'=>'124.123.78.200','agent'=>'Mozilla','latitude'=>$this->cacheService->get('latitude'),'longitude'=>$this->cacheService->get('longitude'),'mobile' => $request->mobile];
        if ($senddata) {
            
            $webData = $this->apiService->sendPostReq('/access/reqAllLogout',$senddata);
            $result= json_decode($webData);
            $this->cacheService->set('data',$webData,4500);
            // var_dump($result);
           
            if($result->errorCode==400){
                return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
            }
            if($result->errorCode==404){
                return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
            }
            if($result->errorCode==301){
                return response()->json(['error' => true,'model'=>'open', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
            }
            if($result->errorCode==202){
                $this->cacheService->delete('login_otp');
                $this->cacheService->set('otp_token',$result->data->token);
                $this->cacheService->set('otp_mobile',$request->mobile);
                return response()->json(['error' => true,'model'=>'close','otp'=>'open', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
            }
            if($result->errorCode==200){
                session(['userToken' =>$result->data->userToken]);
                session(['user' =>$result->data]);
                $this->cacheService->delete('otp_token');
                $this->cacheService->delete('otp_mobile');
                return response()->json(['error' => true,'model'=>'close','otp'=>'close', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => true, 'wayOfRedirect' => 'redirect', 'location' =>'dashboard', 'msg' =>$result->message]);
            }
           
            return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' => $result->message]);
        } else {
            return response()->json(['error' => true,'model'=>'close', 'icon' => 'fas fa-exclamation-triangle', 'color' => 'red', 'reditect' => false, 'msg' => 'Invalid Email or Password.']);
        }

    }


    // submit_otp

    public function submit_otp(Request $request){
        $data = $request->only('otp');
        $validator = Validator::make($data, [
            'otp' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'model'=>'close','icon' => 'fas fa-exclamation-triangle', 'color' => 'red', 'reditect' => false, 'msg' => 'Enter valid mobile and password.']);
        }
        $senddata = ['userIP'=>'124.123.78.200','agent'=>'Mozilla','latitude'=>$this->cacheService->get('latitude'),'longitude'=>$this->cacheService->get('longitude'),'mobile' =>$this->cacheService->get('otp_mobile'),'token' =>$this->cacheService->get('otp_token'),'otp' => $request->otp];
        if ($senddata) {

            if($this->cacheService->get('login_otp')=='true'){
                $webData = $this->apiService->sendPostReq('/access/loginCheckToken',$senddata);
                $result= json_decode($webData);
                $this->cacheService->set('data',$webData,4500);
                if($result->errorCode==400){
                    return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==404){
                    return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==301){
                    return response()->json(['error' => true,'model'=>'open', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==200){
                    session(['userToken' =>$result->data->userToken]);
                    session(['user' =>$result->data]);
                    $this->cacheService->delete('otp_token');
                    $this->cacheService->delete('otp_mobile');
                    return response()->json(['error' => true,'model'=>'close','otp'=>'close', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => true, 'wayOfRedirect' => 'redirect', 'location' =>'dashboard', 'msg' =>$result->message]);
                }
            }else{
                $webData = $this->apiService->sendPostReq('/access/allLogout',$senddata);
                $result= json_decode($webData);
                $this->cacheService->set('data',$webData,4500);
                if($result->errorCode==400){
                    return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==404){
                    return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==301){
                    return response()->json(['error' => true,'model'=>'open', 'icon' => 'fa fa-check', 'color' => 'red', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
                if($result->errorCode==200){
                    $this->cacheService->delete('otp_token');
                    $this->cacheService->delete('otp_mobile');
                    return response()->json(['error' => true,'model'=>'close','otp'=>'close', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
                }
            }
            
            
            // if($result->errorCode==200){
            //     $this->cacheService->delete('otp_token');
            //     $this->cacheService->delete('otp_mobile');
            //     return response()->json(['error' => true,'model'=>'close','otp'=>'close', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => true, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' =>$result->message]);
            // }
           
            return response()->json(['error' => true,'model'=>'close', 'icon' => 'fa fa-check', 'color' => 'green', 'reditect' => false, 'wayOfRedirect' => 'redirect', 'location' =>'', 'msg' => 'Logged in Successfully.'.json_encode($webData)]);
        } else {
            return response()->json(['error' => true,'model'=>'close', 'icon' => 'fas fa-exclamation-triangle', 'color' => 'red', 'reditect' => false, 'msg' => 'Invalid Email or Password.']);
        }
    }



    // Logout the user
    public function logout(Request $request)
    {
        $senddata = ['latitude'=>$this->cacheService->get('latitude'),'longitude'=>$this->cacheService->get('longitude'),'userToken' =>session('userToken')];
        $webData = $this->apiService->GetDataApi('/access/logout',$senddata,session('userToken'));
        session()->forget('userToken');
        session()->forget('user');
        session()->invalidate();
        return redirect()->route('login');
        
    }

    public function setSession(Request $request,$data){
        $result=json_decode(base64_decode($data));
        session(['userToken' =>$result->data->userToken]);
        session(['user' =>$result->data]);
        $this->cacheService->delete('web');
        return redirect()->route('dashboard');
    }
}