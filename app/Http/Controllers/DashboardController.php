<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cache;
use App\Services\ApiService;
use App\Services\CacheService;

class DashboardController extends Controller
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
        $webData = $this->cacheService->get('web');
        if ($webData) {
            $data['web']=$webData;
        } else {
            $webData = $this->apiService->getWebsiteDetails('access/getWebsiteDetails');
            $this->cacheService->set('web',$webData, 120);
            $data['web']=$webData;
        }
        $senddata = ['latitude'=>$this->cacheService->get('latitude'),'longitude'=>$this->cacheService->get('longitude'),'agent'=>$this->cacheService->get('agent'),'type' =>"",'range'=>'today'];
        
        $webData = $this->apiService->GetDataApi('/session/dashboard',$senddata,session('userToken'));
        if($webData['error']==404){
            return redirect()->route('logout');
        }else{
            $data['data']= $webData;
            return view('user.dashboard.index',$data);
        }
        
       
        
    }
    // dashboard_data
    public function dashboard_data(Request $request){
        $data= $request->all();
        $type=$data['type'];
        $range=$data['range'];

        $senddata = ['latitude'=>$this->cacheService->get('latitude'),'longitude'=>$this->cacheService->get('longitude'),'agent'=>$this->cacheService->get('agent'),'type' =>$type,'range'=>$range];
        $webData = $this->apiService->GetDataApi('/session/dashboard',$senddata,session('userToken'));
        $data['data']= $webData;
        return view('pages.dashboard',$data);
    }


    // ----------

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