<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = request()->validate([
            'review' => '',
            'stars' => 'required',
            'service_id' => 'required',
            'user_id' => 'required'
        ]);

        Review::create($data);

        return redirect('/');
    }
}
