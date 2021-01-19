<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Objednávka č. {{ $order->id }}</h1>
    <p><b>Meno a priezvisko:</b> {{ $order->fName }}  {{ $order->lName }}</p>   
    <p><b>Služba:</b> {{ $service->name }}</p>
    {!! DNS2D::getBarcodeHTML(env('APP_URL') . 'order/verify/' . $order->id . '/'. $order->token, 'QRCODE'); !!} 
</body>
</html>