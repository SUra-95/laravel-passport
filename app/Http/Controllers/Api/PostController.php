<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        // return Post::paginate(10);
        
        $data = Post::paginate(10);
        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
}
