<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Developer;
use App\Language;

class DeveloperController extends Controller
{
    public function index()
    {
        return response()->json(Developer::with('languages')->get());
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
