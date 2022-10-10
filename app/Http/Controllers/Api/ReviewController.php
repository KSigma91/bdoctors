<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $name = $data['name'];
        $vote = $data['vote'];
        $text = $data['text'];

        $review = new Review;
        $review->user_id = $id;
        $review->review = $text;
        $review->vote = $vote;
        $review->date =  date('Y-m-d');
        $review->name = $name;
        $review->save();

        return response()->json([
            'success'   => true
        ]);
    }
}
