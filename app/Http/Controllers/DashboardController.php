<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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
        $data['data']= $webData;
        return view('user.dashboard.index',$data);
        
    }
    // dashboard_data
    public function dashboard_data(Request $request){
        $data= $request->all();
        $type=$data['type'];
        $range=$data['range'];

        $senddata = ['latitude'=>$this->cacheService->get('latitude'),'longitude'=>$this->cacheService->get('longitude'),'type' =>$type,'range'=>$range];
        $webData = $this->apiService->GetDataApi('/session/dashboard',$senddata,session('userToken'));
        $data['data']= $webData;
        return view('pages.dashboard',$data);
    }
}