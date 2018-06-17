<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>PDF invoice | SmartStay</title>

    <style>
        body {
            font-family: OpenSansLight, sans-serif;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="text-left">
            <img src="{{ '../public/img/icon/logoTransparente.png' }}" width="100" alt="logo smartstay">
        </div>
    </div>
    <div class="text-right">
        <h5>JAUME BALMES</h5>
    </div>
    <hr>
    <div class="row" style="margin-bottom: 20px;">
        <h3 class="text-right">INVOICE</h3>
    </div>

    <div class="row" style="margin-bottom: -40px;">
        <div class="col-sm-7">
            <div class="card" style="margin-left: -20px;">
                <h5 class="card-header">From: Jaume Balmes</h5>
                <div class="card-body">
                    <p class="card-text" style="margin-top:40px;"><strong>Address:</strong> Carrer de Pau Claris 121,
                        08009 Barcelona<br>
                        <strong>E-mail:</strong> receptionist@smartstay.com<br>
                        <strong>Phone:</strong> 0034 934 87 03 01</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="float:right; margin-right: -20px;">
            <div class="card">
                <h5 class="card-header">To: Guest</h5>
                <div class="card-body">
                    <p class="card-text" style="margin-top:40px;">
                        <strong>ID:</strong>
                        @foreach($guests as $guest)
                            |{{ $guest->id }}
                        @endforeach
                        <br/>
                        <strong>Room Nº:</strong>{{ $guest->rooms[0]->number }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 50px;">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Id Order</th>
                <th scope="col">Service</th>
                <th scope="col">Order Date</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @php
                $total = 0;
            @endphp
            @foreach($orders as $guest)
                @foreach($guest as $order)
                    <tr>
                        <th scope="row">{{ $order->id }} </th>
                        <td>{{ $order->serviceName }}</td>
                        <td>{{ $order->order_date }}</td>
                        @if(!empty($order->quantity))
                            <td align="center">{{ $order->quantity }}</td>
                            @else
                            <td align="center">---</td>
                        @endif
                        @if(!empty($order->price))
                            <td align="center">{{ $order->price }}</td>
                            @else
                            <td align="center">---</td>
                        @endif
                    </tr>
                    @php
                    $total += $order->price;
                    @endphp
                @endforeach
            @endforeach
            <tr>
                <td><strong>Total Balance:</strong></td>
                <td><strong>{{ $total }} Euros</strong></td>
            </tr>
            </tbody>
        </table>

    </div>

    <div class="row">
        <div class="col-sm-12" style="margin-left: -20px;">
            <div class="card">
                <h5 class="card-header">Guest Details:</h5>
                <div class="card-body">
                    <p class="card-text" style="margin-top:40px;"><strong>Name:</strong>
                        @foreach($guests as $guest)
                            |{{ $guest->firstname . ' ' . $guest->lastname}}
                        @endforeach
                        <br>
                        <strong>Check-in Date: </strong> {{ $guest->rooms[0]->pivot->checkin_date }} <br/>
                        <strong>Check-out Date: </strong> {{ $guest->rooms[0]->pivot->checkout_date }} <br/></p>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
