<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    public function index()
    {
        $user = User::with(['sponsorships'])->whereHas('sponsorships', function ($q) {
            $q->where('ending_date', '>', date('Y-m-d H:i:s'));
        })->where('id', Auth::id())->get();
        $sponsorships = Sponsorship::all();
        if (count($user) === 1) {
            return view('doctor.sponsorship.index', [
                'sponsorships' => $sponsorships,
                'user' => $user
            ]);
        } else {
            return view('doctor.sponsorship.index', [
                'sponsorships' => $sponsorships,
                'user' => 0
            ]);
        }
    }

    public function show(Sponsorship $sponsorship)
    {
        return view('doctor.sponsorship.show', compact('sponsorship'));
    }
}
