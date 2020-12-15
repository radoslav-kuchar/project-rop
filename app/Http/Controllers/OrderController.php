<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Order;

class OrderController extends Controller
{
    public function create(Service $service)
    {
        return view('order.create', compact('service'));
    }
    public function store(Request $request)
    {
        Order::create([
            'service_id' => $request->service_id,
            'fName' => $request->fName,
            'lName' => $request->lName,
            'email' => $request->email,
            'phone' => $request->phone,
            'token' => Str::random(32),
        ]);
    }
    public function show(Order $order){
        return view('order.show', compact('order'));
    }
}
