<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Developer;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
        return response()->json($developers);
    }
    public function show($slug)
    {
        $developer = Developer::where('slug', $slug)->with(['messages', 'reviews'])->first();
        if(empty($developer)){
            return response()->json(['message'=>'Post not found'], 404);
        }
        return response()->json($developer);
    }
}
