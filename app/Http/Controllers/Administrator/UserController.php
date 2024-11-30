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
        return view('user.users.index');
    }
    public function index1(Request $request)
    {
   


        $senddata = [
            'latitude'=>$this->cacheService->get('latitude'),
            'longitude'=>$this->cacheService->get('longitude'),
            'agent'=>$this->cacheService->get('agent'),
            'mobileNumber' =>"",
            'count'=>10,
            'userRole'=>"",
            'sponsorMobile'=>"",
            'startDate'=>"",
            'endDate'=>"",
            'accountStatus'=>"",
            'offset'=>20
        ];
        $webData = $this->apiService->GetDataApi('/session/getUserList',$senddata,session('userToken'));
      

        // if($webData['errorCode']==200){
        //     return response()->json([
        //         'draw' => 10,
        //         'recordsTotal' => 100,
        //         'recordsFiltered' => 20,
        //         'data' => $webData['data']['records'],
        //     ]);
        // }


        // return response()->json([
        //     'draw' => 0,
        //     'recordsTotal' => 0,
        //     'recordsFiltered' => 0,
        //     'data' =>[],
        // ]);

        // $bulkData['rows'] = $webData['data']['records'];
        // return (json_encode($bulkData));
        return response()->json([
            'rows' =>$webData['data']['records']
        ]);
        // var_dump($webData);





        die;
     /*   // Get all query parameters from DataTables
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $search = $request->input('search.value');

        // Build the query
        $query = User::query();

        // If there's a search term, filter the results
        if ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        // Apply pagination
        $users = $query->offset($start)
                       ->limit($length)
                       ->get();

        // Get total count (before any search/filtering)
        $totalRecords = User::count();

        // If there is a search, count records after applying the search filter
        $filteredRecords = $search ? $query->count() : $totalRecords;
*/
        // $filteredRecords=[];
        // Return the data in the expected format
        // return response()->json([
        //     'draw' => 10,
        //     'recordsTotal' => 100,
        //     'recordsFiltered' => 20,
        //     'data' => [],
        // ]);






        $data='{
    "draw": 1,
    "recordsTotal": 100,
    "recordsFiltered": 50,
    "data": [
        {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "created_at": "2024-01-01T12:00:00",
            "updated_at": "2024-01-01T12:00:00"
        },
        {
            "id": 2,
            "name": "Jane Smith",
            "email": "jane@example.com",
            "created_at": "2024-01-02T12:00:00",
            "updated_at": "2024-01-02T12:00:00"
        }
    ]
}
';


return $data;










    
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
}