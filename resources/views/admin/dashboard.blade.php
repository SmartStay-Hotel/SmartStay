@extends('admin.layout')
@section('css')
    <style>

    </style>
@endsection
@section('content')

    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px; margin-bottom: 20px;">
        <div class="flex-grid">
            <a href="{{ url('admin/checkin') }}" id="checkInBtn" class="btn btn-success">Check in</a>
            <a href="{{ url('admin/checkout') }}" id="checkOutBtn" class="btn btn-danger">Check out</a>
            <a href="#" id="bookingsBtn" class="btn btn-info">Bookings</a>
            <a href="{{ route('guests.create') }}" class="btn btn-secondary" id="newBookingBtn">New Booking</a>
        </div>
    </div>

    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
    <div class="flex-grid">
        <div class="card text-center">
            <h5 class="card-header" id="pendingOrdersHeader">PENDING ORDERS</h5>
            <div class="card-body" id="pendingOrdersBody">
                <h5 class="card-title text-left">Service - Customer - Room Nr</h5>
                <div id="test-list">
                <ul class="list" id="dispatchedOrdersList">

                        @foreach($services->sortBy('updated_at') as $service)
                            @if($service->status == '1')
                                <li>
                                    <a href="{{ route( strtolower($service->serviceName) . '.show', $service->id) }}">
                                        <span>{{ $service->serviceName }}</span>
                                        <span>{{ $service->guest->firstname }}</span>
                                        <span>{{ $service->roomNumber }}</span>
                                        <input type="checkbox"
                                               name="{{ $service->serviceName .'/'.$service->id }}" id="pending"
                                               @if ($service->status == '2') checked @endif style="float:right">
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

                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i style="display: block;" class="fas fa-check"></i></button>
                            </li>

                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i style="display: block;" class="fas fa-check"></i></button>
                            </li>

                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i style="display: block;" class="fas fa-check"></i></button>
                            </li>

                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i style="display: block;" class="fas fa-check"></i></button>
                            </li>

                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i style="display: block;" class="fas fa-check"></i></button>
                            </li>

                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i style="display: block;" class="fas fa-check"></i></button>
                            </li>

                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i style="display: block;" class="fas fa-check"></i></button>
                            </li>

                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i style="display: block" class="fas fa-check"></i></button>
                            </li>

                    </ul>
                    <ul class="pagination"></ul>
                </div>
                </div>
            </div>

        <div class="card text-center">
            <h5 class="card-header" id="dispatchedOrdersHeader">DISPATCHED ORDERS</h5>
            <div class="card-body" id="dispatchedOrdersBody">
                <h5 class="card-title">Dispatched orders</h5>
                <div id="test-list2">
                <ul class="list" id="dispatchedOrdersList">

                        @foreach($services->sortByDesc('updated_at') as $service)
                            @if($service->status == 2)
                                <li>
                                    <a href="{{ route( strtolower($service->serviceName) . '.show', $service->id) }}">
                                        <span>{{ $service->serviceName }}</span>
                                        <span>{{ $service->guest->firstname }}</span>
                                        <span>{{ $service->roomNumber }}</span>
                                        <input type="checkbox"
                                               name="{{ $service->serviceName .'/'.$service->id  }}" id="pending"
                                               @if ($service->status == '2') checked @endif style="float:right">
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
                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span>
                                <button style="float:right"><i class="fas fa-times"></i></button>
                            </li>
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
                    <ul class="pagination"></ul>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <script>
        //add pagination to order's tables
        var firstList = new List('test-list', {
            valueNames: ['name'],
            page: 10,
            pagination: true
        });

        var secondList = new List('test-list2', {
            valueNames: ['name'],
            page: 10,
            pagination: true
        });
    </script>
    <script>
        //Toastr configuration:
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": false,
            "extendedTimeOut": "3000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "closeOnHover": false
        };
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('d4313af143d783c51d79', {
            cluster: 'eu',
            encrypted: false
        });

        var channel = pusher.subscribe('smartstay-services');
        channel.bind('App\\Events\\NewOrderRequest', function (data) {
            //alert(data.message);
            toastr.options.onclick = function () {
                window.location = data.goToShow.toLowerCase();
            };
            toastr.success(data.message, 'New Order:');
        });
    </script>
    <script>
        //ask for confirmation before changing/deleting orders from table
        $(document).ready(function () {
            //toastr.success('Welcome Isabella!');

            //Change status services:
            $(':checkbox').change(function (event) {
                var $this = this;
                var route = 'service/status' + event.target.name + '';
                if ($($this).is(':checked')) {

                    toastr.options = {'closeButton': false, 'timeOut': false, 'closeOnHover': false};
                    toastr.warning('<div><button type="button" id="cancelBtn" class="btn btn-primary">Cancel</button><button type="button" id="okBtn" class="btn" style="margin: 0 8px 0 8px">Ok</button></div>', 'Is it already completed?');

                    $('#okBtn').click(function () {
                        $.get(route, function (response, status) {
                            location.reload();
                            console.log("Completed " + response);
                        });
                    });

                    $('#cancelBtn, #toast-container').click(function () {
                        $this.checked = false;
                    });

                } else {
                    $.get(route, function (response, status) {
                        location.reload();
                        console.log("In process " + response);
                    });
                }
            });
        });
    </script>
@endsection