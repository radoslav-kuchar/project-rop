<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function create(Service $service)
    {
        return view('order.create', compact('service'));
    }
    public function store(Request $request)
    {
        $order = Order::create([
            'service_id' => $request->service_id,
            'fName' => $request->fName,
            'lName' => $request->lName,
            'email' => $request->email,
            'phone' => $request->phone,
            'token' => Str::random(32),
        ]);

        $service = Service::findOrFail($request->service_id);

        Mail::send('mail.order', compact('order', 'service'), function($message) use ($order){
            $message->from('us@example.com', 'Laravel');
            $message->subject('Objednávka č. ' . $order->id . ' bola úspešná.');
            $message->to($order->email);
        });

        return redirect('/services')->with('success', 'Úspešne objednané');
    }
    public function show(Order $order){
        return view('order.show', compact('order'));
    }
    public function verify(Order $order, $token){
        if($order->checkToken($token)) {
            return redirect('/services')->with('success', 'Objednávka vybavená.');
        }
        else{
            return redirect('services')->withErrors('Došlo k problému. Kontaktujte zákaznícku podporu.');
        }
    }
}
