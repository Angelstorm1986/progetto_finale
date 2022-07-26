<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Developer;
use App\Language;
use App\Review;


class RenderController extends Controller
{
    public function filter($id, $minRating, $minReview)
    {
        //$dev = Developer::with('languages')->where('language_id',$id)->get();
        $dev = Language::with('developers')->where('id',$id)->get();
        //SELECT AVG(rate) AS media, developer_id FROM reviews LEFT JOIN developers ON developer_id = developers.id GROUP BY developer_id HAVING media > 3
        //SELECT developer_id, COUNT(developer_id) as numRev FROM reviews LEFT JOIN developers ON developer_id = developers.id GROUP BY developer_id
        //$devPlus = Language::with('developers')->with('reviews')->get();
        //SELECT * FROM developers LEFT JOIN developer_language ON developers.id = developer_id LEFT JOIN languages ON languages.id = language_id LEFT JOIN reviews ON developers.id = reviews.developer_id

        $call = "";

        $selectString ="SELECT AVG(rate) AS media, developers.id, developers.photo, COUNT(reviews.developer_id) as numRev, users.name, users.surname";
        $fromString =" FROM developers LEFT JOIN developer_language ON developers.id = developer_id LEFT JOIN languages ON languages.id = language_id LEFT JOIN reviews ON developers.id = reviews.developer_id LEFT JOIN users ON developers.user_id = users.id GROUP BY developers.id";


        $count = 0;
        if ($id != "nulla") {
            $count = 5;
        }else if($minRating){
            $count = 3;
        }else if($minReview){
            $count = 1;
        }
        switch($count){
            case 5:
                $selectString .= ", language_id";
                $fromString .= ", language_id";
                $fromString .= " HAVING language_id = {$id}";
                if($minRating){
                    $fromString .= " AND media >= {$minRating}";
                    if($minReview){
                        $fromString .= " AND numRev >= {$minReview}";
                    }
                }else if($minReview){
                    $fromString .= " AND numRev >= {$minReview}";
                }
                break;
            case 3: 
                $fromString .= " HAVING media >= {$minRating}";
                if($minReview){
                    $fromString .= " AND numRev >= {$minReview}";
                }
                break;
            case 1:
                $fromString .= " HAVING numRev >= {$minReview}";
        };

        $call = $selectString .= $fromString;

        $devPlus = DB::select($call);

        return response()->json($devPlus);
    }
}
