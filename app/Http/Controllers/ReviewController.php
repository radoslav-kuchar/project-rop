<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = request()->validate([
            'review' => '',
            'stars' => 'required',
            'service_id' => 'required',
        ]);

        Review::create([
            'review' => $data['review'],
            'stars' => $data['stars'],
            'service_id' => $data['service_id'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/');
    }
}
