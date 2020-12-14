<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        auth()->user()->reviews()->create($data);

        return back()->with('success', 'Recenzia úspešne pridaná.');
    }
}
