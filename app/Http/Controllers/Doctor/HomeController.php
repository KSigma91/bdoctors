<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = [];
        $reviews = [];
        for ($i = 1; $i < 13; $i++) {
            $dateFrom = date('Y') . '-' . $i . '-01';
            $dateTo = date('Y') . '-' . $i . '-31';
            $message = Message::where('user_id', Auth::id())->whereBetween('date', [$dateFrom, $dateTo])->get();
            $messages[$i] = count($message);
            $review = Review::where('user_id', Auth::id())->whereBetween('date', [$dateFrom, $dateTo])->get();
            $reviews[$i] = count($review);
        }
        return view('doctor.dashboard', [
            'messages' => $messages,
            'reviews' => $reviews
        ]);
    }
}
