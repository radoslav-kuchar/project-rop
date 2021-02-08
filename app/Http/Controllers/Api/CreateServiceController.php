<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class CreateServiceController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string',  'min:20', 'max:1000'],
            'price' => 'required|integer ',
            'category' => 'required',
            'city' => 'required',
        ]);

        Service::store([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'city' => $request->city,
        ]);

        return response()->json(['msg' => 'Create service successsss']);

    }
}
