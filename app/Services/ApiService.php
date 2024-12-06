<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Services\CookieService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ApiService
{
    protected $baseUrl;
    // protected $cookieService;
    public function __construct()
    {
        $this->cookieService = new CookieService();
        $this->baseUrl = env('API_BASE_URL')??'https://api.needu.in/admin/';
        $this->hostName = env('API_HOST_NAME')??'admin.needu.in';
        $this->apiUrl=Cache::get('baseUrl').'/admin';
    }

    /*
    public function getRequest(string $endpoint, array $params = [])
    {
        $url = $this->baseUrl . $endpoint;
        return Http::get($url, $params);
    }

    // Function to make POST requests
    public function postRequest(string $endpoint, array $data = [])
    {
        $url = $this->baseUrl . $endpoint;
        return Http::post($url, $data);
    }

    // Function to handle multiple API calls
    public function callMultipleApis()
    {
        $api1Response = $this->getRequest('/admin/access/getWebsiteDetails', [
            'hostName' => $this->hostName,
        ]);

        $api2Response = $this->postRequest('/another/api/endpoint', [
            'param1' => 'value1',
            'param2' => 'value2',
        ]);

        return [
            'api1' => $api1Response->json(),
            'api2' => $api2Response->json(),
        ];
    }


    public function getRequest(string $endpoint, array $params = [])
    {
        $client = new Client();
        $url = $this->baseUrl . $endpoint;

        try {
            $response = $client->get($url, [
                'query' => $params,
                'timeout' => 30,  // Timeout after 30 seconds
            ]);


         
            $a=CookieService::setWebData('webdata',$response);
            // $cookie = cookie('webdata', $response, 12 * 60);
            var_dump($a);
            die;


            

            // return json_decode($response->getBody()->getContents(), true);

        } catch (\Exception $e) {
            // Handle the exception (e.g., log it or return an error response)
            return ['error' => 'API request failed', 'message' => $e->getMessage()];
        }
    }*/

    public function postRequest(string $endpoint, array $data = [])
    {
        $client = new Client();
        $url = $this->apiUrl . $endpoint;
        try {
            $response = $client->post($url, [
                'json' => $data,
                'timeout' => 30,
            ]);
            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            return ['error' => 'API request failed', 'message' => $e->getMessage()];
        }
    }



    // getWebsiteDetails

    public function getWebsiteDetails(string $endpoint,array $params = []){


      
        $client = new Client();
        $url = $this->baseUrl . $endpoint;
        $data = [
            'hostName' => $this->hostName,
        ];
        try {
            $response = $client->post($url, [
                'form_params' => $data,
                'timeout' => 30,
            ]);
            $apiData = json_decode($response->getBody()->getContents(), true);
            return $apiData;
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'API request failed',
                'message' => $e->getMessage(),
            ], 500);
        }

    }





    // sendPostReq

    public function sendPostReq(string $endpoint,array $params = []){
        $client = new Client();
        $url = $this->apiUrl . $endpoint;
        try {
            $response = $client->post($url, [
                'form_params' => $params,
                'timeout' => 30,
            ]);
            $apiData = $response->getBody()->getContents();
            return $apiData;
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'API request failed',
                'message' => $e->getMessage(),
            ], 500);
        }

    }


    // GetDataApi
    public function GetDataApi(string $endpoint, array $params = [], string $bearerToken = null)
    {

        // $client = new Client();
        $url = $this->apiUrl . $endpoint;

        // $response = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . $bearerToken,
        // ])->timeout(30)
        // ->retry(3, 200)
        // ->post($url, $params);

        try {
            // Send the POST request
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearerToken,
            ])
            ->timeout(30)  // Timeout after 30 seconds
            ->retry(3, 200)  // Retry 3 times on 200 status code
            ->post($url, $params);

            // Handle successful response
            if ($response->successful()) {
                return $response->json();  // Return the decoded JSON response
            }

            // Handle different error statuses
            if ($response->clientError()) {
                Log::error('Client Error (4xx)', [
                    'url' => $url,
                    'response' => $response->body(),
                    'params' => $params
                ]);
                return [
                    'error' => true,
                    'message' => 'Client Error (4xx): ' . $response->body()
                ];
            }

            if ($response->serverError()) {
                Log::error('Server Error (5xx)', [
                    'url' => $url,
                    'response' => $response->body(),
                    'params' => $params
                ]);
                return [
                    'error' => true,
                    'message' => 'Server Error (5xx): ' . $response->body()
                ];
            }

            // Handle any other response status
            Log::error('Unexpected Response', [
                'url' => $url,
                'status_code' => $response->status(),
                'response' => $response->body(),
                'params' => $params
            ]);
            return [
                'error' => 404,
                'message' => 'Unexpected Error: ' . $response->body()
            ];

        } catch (\Exception $e) {
            // Catch any exception (e.g., network errors, invalid JSON, etc.)
            Log::error('Request Exception', [
                'url' => $url,
                'params' => $params,
                'error_message' => $e->getMessage()
            ]);
            return [
                'error' => 404,
                'message' => 'Exception occurred: ' . $e->getMessage()
            ];
        }









        // if ($response->successful()) {
        //     $responses = $response->json();
        // } else {
        //     $responses = $response->body();
        // }

        // return $responses;



         
    }





    // GetMethodDataApi
    public function GetMethodDataApi(string $endpoint, array $params = [], string $bearerToken = null)
    {

        // $client = new Client();
        $url = $this->apiUrl . $endpoint;

        try {
            // Send the POST request
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearerToken,
            ])
            ->timeout(30)
            ->retry(3, 200)
            ->get($url, $params);

            // Handle successful response
            if ($response->successful()) {
                return $response->json();  // Return the decoded JSON response
            }

            // Handle different error statuses
            if ($response->clientError()) {
                Log::error('Client Error (4xx)', [
                    'url' => $url,
                    'response' => $response->body(),
                    'params' => $params
                ]);
                return [
                    'error' => true,
                    'message' => 'Client Error (4xx): ' . $response->body()
                ];
            }

            if ($response->serverError()) {
                Log::error('Server Error (5xx)', [
                    'url' => $url,
                    'response' => $response->body(),
                    'params' => $params
                ]);
                return [
                    'error' => true,
                    'message' => 'Server Error (5xx): ' . $response->body()
                ];
            }

            // Handle any other response status
            Log::error('Unexpected Response', [
                'url' => $url,
                'status_code' => $response->status(),
                'response' => $response->body(),
                'params' => $params
            ]);
            return [
                'error' => 404,
                'message' => 'Unexpected Error: ' . $response->body()
            ];

        } catch (\Exception $e) {
            // Catch any exception (e.g., network errors, invalid JSON, etc.)
            Log::error('Request Exception', [
                'url' => $url,
                'params' => $params,
                'error_message' => $e->getMessage()
            ]);
            return [
                'error' => 404,
                'message' => 'Exception occurred: ' . $e->getMessage()
            ];
        }


    }



    // getMethod
    public function getMethod(string $endpoint, array $params = [], string $bearerToken = null)
    {

        // $client = new Client();
        $url = $this->apiUrl . $endpoint;

        try {
            // Send the POST request
            $response = Http::get($url);

            if ($response->successful()) {
                return $response->json();
            }

            // Handle different error statuses
            if ($response->clientError()) {
                Log::error('Client Error (4xx)', [
                    'url' => $url,
                    'response' => $response->body(),
                    'params' => $params
                ]);
                return [
                    'error' => true,
                    'message' => 'Client Error (4xx): ' . $response->body()
                ];
            }

            if ($response->serverError()) {
                Log::error('Server Error (5xx)', [
                    'url' => $url,
                    'response' => $response->body(),
                    'params' => $params
                ]);
                return [
                    'error' => true,
                    'message' => 'Server Error (5xx): ' . $response->body()
                ];
            }

            // Handle any other response status
            Log::error('Unexpected Response', [
                'url' => $url,
                'status_code' => $response->status(),
                'response' => $response->body(),
                'params' => $params
            ]);
            return [
                'error' => 404,
                'message' => 'Unexpected Error: ' . $response->body()
            ];

        } catch (\Exception $e) {
            // Catch any exception (e.g., network errors, invalid JSON, etc.)
            Log::error('Request Exception', [
                'url' => $url,
                'params' => $params,
                'error_message' => $e->getMessage()
            ]);
            return [
                'error' => 404,
                'message' => 'Exception occurred: ' . $e->getMessage()
            ];
        }


    }












    






}