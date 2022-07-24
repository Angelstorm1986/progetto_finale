<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Developer;
use App\Review;

class ReviewController extends Controller
{
    public function filter($vote)
    {
        $dev = Developer::with('review')->where([
            
        ])->get();
        return response()->json($dev);
    }
}
