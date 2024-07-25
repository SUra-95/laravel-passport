<?php

namespace App\Http\Controllers;

use App\Services\MockApiService;

class ApiController extends Controller
{
    protected $apiService;

    public function __construct(MockApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function posts(){
        $response = $this->apiService->makeAPIRequest('posts');

        return response()->json([
            'data' => json_decode($response),
        ]);
    }
    
    public function comments(){
        $response = $this->apiService->makeAPIRequest('comments');

        return response()->json([
            'data' => json_decode($response),
        ]);
    }
}
