@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        {!! DNS2D::getBarcodeHTML(env('APP_URL') . 'order/verify/' . $order->token, 'QRCODE'); !!}
    </div>
</div>
@endsection