<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Developer;
use App\Review;

class ReviewController extends Controller
{
    public function review($rev){
        $selectString = "SELECT * FROM reviews WHERE developer_id = {$rev}";
        $devPlus = DB::select($selectString);
        return response()->json($devPlus);
    }
}
