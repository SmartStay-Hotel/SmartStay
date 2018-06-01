@extends('admin.layout')
@section('css')
    <style>

    </style>
@endsection
@section('content')

    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <div class="flex-grid">
        <a href="{{ url('admin/checkin') }}" id="checkInBtn" class="btn btn-success">Check in</a>
        <a href="{{ url('admin/checkout') }}" id="checkOutBtn" class="btn btn-danger">Check out</a>
        <a href="#" id="bookingsBtn" class="btn btn-info">Bookings</a>
        <a href="{{ route('guests.create') }}" class="btn btn-secondary" id="newBookingBtn" >New Booking</a>
        </div>
    </div>

    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
    <div class="flex-grid">
        <div class="card text-center">
            <h5 class="card-header" id="pendingOrdersHeader">PENDING ORDERS</h5>
            <div class="card-body" id="pendingOrdersBody">
                <h5 class="card-title">Orders ready to be dispatched</h5>
                <ul class="card-text" id="dispatchedOrdersList">

                        @foreach($restaurants as $restaurant)
                            @if($restaurant->status == '1')
                                <li>
                                    <a href="{{ route('restaurant.show', $restaurant->id) }}">
                                        <span>{{ $restaurant->serviceName }}</span>
                                        <span>{{ $restaurant->guest->firstname }}</span>
                                        <span>{{ $restaurant->guest->rooms[0]->number }}</span>
                                        <input type="checkbox" name="{{ $restaurant->serviceName .'/'.$restaurant->id }}" id="pending"
                                               @if ($restaurant->status == '2') checked @endif style="float:right">
                                    </a>
                                </li>

                            @endif
                        @endforeach

                        <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                            <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                        </li>
                        <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                            <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                        </li>
                        <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                            <button style="float:right"><i style="display: block;" class="fas fa-check"></i></button>
                        </li>


                    </ul>
                </div>
            </div>

        <div class="card text-center">
            <h5 class="card-header" id="dispatchedOrdersHeader">DISPATCHED ORDERS</h5>
            <div class="card-body" id="dispatchedOrdersBody">
                <h5 class="card-title">Dispatched orders</h5>
                <ul class="card-text" id="dispatchedOrdersList">

                        @foreach($restaurants as $restaurant)
                            @if($restaurant->status == 2)
                                <li>
                                    <a href="{{ route('restaurant.show', $restaurant->id) }}">
                                        <span>{{ $restaurant->serviceName }}</span>
                                        <span>{{ $restaurant->guest->firstname }}</span>
                                        <span>{{ $restaurant->guest->rooms[0]->number }}</span>
                                        <input type="checkbox" name="{{ $restaurant->serviceName .'/'.$restaurant->id  }}" id="pending"
                                               @if ($restaurant->status == '2') checked @endif style="float:right">
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                            <button style="float:right"><i class="fas fa-times"></i></button>
                        </li>
                        <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                            <button style="float:right"><i class="fas fa-times"></i></button>
                        </li>
                        <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                            <button style="float:right"><i class="fas fa-times"></i></button>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('d4313af143d783c51d79', {
            cluster: 'eu',
            encrypted: false
        });

        var channel = pusher.subscribe('smartstay-services');
        channel.bind('App\\Events\\NewOrderRequest', function(data) {
            //alert(data.message);
            toastr.success(data.message);
        });
    </script>
    <script>
        //ask for confirmation before changing/deleting orders from table
        $(document).ready(function () {
            // for success - green box
            toastr.success('Welcome Eduardo!');
            $(':checkbox').change(function (event) {
                var route = 'service/status' + event.target.name + '';
                if ($(this).is(':checked')) {
                    if (confirm("Is it already completed?")) {
                        $.get(route, function (response, state) {
                            location.reload();
                            console.log("Completed " + response);
                        });
                    } else {
                        this.checked = false;
                    }
                } else {
                    $.get(route, function (response, state) {
                        location.reload();
                        console.log("In process " + response);
                    });
                }
            });
        });
    </script>

    <script>
        /*
        function notifyMe() {
            // Let's check if the browser supports notifications
            if (!("Notification" in window)) {
                console.log("This browser does not support desktop notification");
            }

            // Let's check whether notification permissions have alredy been granted
            else if (Notification.permission === "granted") {
                // If it's okay let's create a notification
                var notification = new Notification("Hi there!");
            }

            // Otherwise, we need to ask the user for permission
            else if (Notification.permission !== 'denied' || Notification.permission === "default") {
                Notification.requestPermission(function (permission) {
                    // If the user accepts, let's create a notification
                    if (permission === "granted") {
                        var notification = new Notification("Hi there!");
                    }
                });
            }

            // At last, if the user has denied notifications, and you
            // want to be respectful there is no need to bother them any more.
        }
        notifyMe();
        if (window.Notification) {
            console.log('Notifications are supported!');
        } else {
            alert('Notifications aren\'t supported on your browser! :(');
        }
        */
    </script>
@endsection