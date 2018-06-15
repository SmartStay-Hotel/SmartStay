<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>PDF invoice | SmartStay</title>

</head>
<body>
<h1>SmartStay</h1>
<h2>Invoice</h2>
<h4>Guests</h4>
@foreach($guests as $guest)
    <strong>ID</strong> {{ $guest->id }} <br/>
    <strong>Guest Name: </strong> {{ $guest->firstname . ' ' . $guest->lastname}} <br/>
    <strong>Room Nº: </strong> {{ $guest->rooms[0]->number }} <br/>
    <strong>Check-in Date: </strong> {{ $guest->rooms[0]->pivot->checkin_date }} <br/>
    <strong>Check-out Date: </strong> {{ $guest->rooms[0]->pivot->checkout_date }} <br/>
    <strong>Total Balance: </strong> {{ $guest->balance }} € <br/>
    <hr>
@endforeach

<h4>Services</h4>
@foreach($orders as $guest)
    @foreach($guest as $order)
        <h5>Details</h5>
        <strong>ID</strong> {{ $order->id }} <br/>
        <strong>Service: </strong> {{ $order->serviceName }} <br/>
        <strong>Service: </strong> {{ $order->serviceName }} <br/>
        <strong>Room Nº: </strong> {{ $order->roomNumber }} <br/>
        <strong>Guest Id: </strong> {{ $order->guest_id }} <br/>
        <strong>Order Date: </strong> {{ $order->order_date }} <br/>
        @if(!empty($order->quantity))
            <strong>Quantity: </strong> {{ $order->quantity }} <br/>
        @endif
        @if(!empty($order->price))
            <strong>price: </strong> {{ $order->price }} <br/>
        @endif
        <hr>
    @endforeach
@endforeach
</body>
</html>
