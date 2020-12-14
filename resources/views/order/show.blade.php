@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        {!! DNS2D::getBarcodeHTML($order->token, 'QRCODE'); !!}
    </div>
</div>
@endsection