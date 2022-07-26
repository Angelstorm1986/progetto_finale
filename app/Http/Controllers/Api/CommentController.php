<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Developer;

class CommentController extends Controller
{
    public function comm($com){
        $selectString = "SELECT * FROM messages WHERE developer_id = {$com}";
        $devPlus = DB::select($selectString);
        return response()->json($devPlus);
    }
}
