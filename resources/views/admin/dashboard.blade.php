@extends('admin.layout')
@section('content')

    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px; margin-bottom: 20px;">
        <div class="flex-grid">
            <a href="{{ url('admin/checkin') }}" id="checkInBtn" class="btn btn-success">Check in</a>
            <a href="{{ url('admin/checkout') }}" id="checkOutBtn" class="btn btn-danger">Check out</a>
            <a href="#" id="bookingsBtn" class="btn btn-info">Bookings</a>
            <a href="{{ route('guests.create') }}" class="btn btn-secondary" id="newBookingBtn">New Booking</a>
        </div>
    </div>

    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px; margin-bottom: 20px;">
        <div id="accordion">
            <div class="card">
                <div id="headingOne">
                    <h5 class="card-header text-center" id="newOrdersHeader" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        NEW ORDERS
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body" id="newOrdersBody">
                        <h5 class="card-title text-center">
                            <span style="padding: 10px;">Service</span>
                            <span>-</span>
                            <span style="padding: 10px;">Customer</span>
                            <span>-</span>
                            <span style="padding: 10px;">Room Nr</span>
                        </h5>

                        <div id="test-list3">
                            <ul class="list" id="newOrdersList">

                                @foreach($services->sortBy('updated_at') as $service)
                                    @if($service->status == '0')
                                        <li class="text-center">
                                            <label class="container">
                                                <a style=""
                                                   href="{{ route( strtolower($service->serviceName) . '.show', $service->id) }}">
                                                    <span style="padding: 10px;">{{ $service->serviceName }}</span>
                                                    <span style="padding: 10px;">-</span>
                                                    <span style="padding: 10px;">{{ $service->guest->firstname }}</span>
                                                    <span style="padding: 10px;">-</span>
                                                    <span style="padding: 10px;">{{ $service->roomNumber }}</span>

                                                </a>
                                                <input type="checkbox"
                                                       name="{{ $service->serviceName .'/'.$service->id }}"
                                                       @if ($service->status == '0') checked @endif><span
                                                        class="checkmark"></span>
                                            </label>
                                        </li>

                                    @endif
                                @endforeach

                            </ul>
                            <ul class="pagination"></ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <div class="flex-grid">
            <div id="accordion2">
                <div class="card">
                    <div id="headingTwo">
                        <h5 class="card-header text-center" id="pendingOrdersHeader" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            PENDING ORDERS
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion2">
                        <div class="card-body" id="pendingOrdersBody">
                            <h5 class="card-title text-center">
                                <span style="padding: 10px;">Service</span>
                                <span>-</span>
                                <span style="padding: 10px;">Customer</span>
                                <span>-</span>
                                <span style="padding: 10px;">Room Nr</span>

                            </h5>
                            <div id="test-list">
                                <ul class="list" id="pendingOrdersList">

                                    @foreach($services->sortBy('updated_at') as $service)
                                        @if($service->status == '1')
                                            <li class="text-center">
                                                <label class="container">
                                                    <a style=""
                                                       href="{{ route( strtolower($service->serviceName) . '.show', $service->id) }}">
                                                        <span style="padding: 10px;">{{ $service->serviceName }}</span>
                                                        <span style="padding: 10px;">-</span>
                                                        <span style="padding: 10px;">{{ $service->guest->firstname }}</span>
                                                        <span style="padding: 10px;">-</span>
                                                        <span style="padding: 10px;">{{ $service->roomNumber }}</span>
                                                    </a>
                                                    <input type="checkbox"
                                                           name="{{ $service->serviceName .'/'.$service->id }}"
                                                           @if ($service->status == '2') checked @endif><span
                                                            class="checkmark"></span>

                                                </label>
                                            </li>

                                        @endif
                                    @endforeach


                                </ul>
                                <ul class="pagination"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="accordion3">
                <div class="card text-center">
                    <div id="headingThree">
                        <h5 class="card-header text-center" id="dispatchedOrdersHeader" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            DISPATCHED ORDERS
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                         data-parent="#accordion3">

                        <div class="card-body" id="dispatchedOrdersBody">
                            <h5 class="card-title text-center">
                                <span style="padding: 10px;">Service</span>
                                <span>-</span>
                                <span style="padding: 10px;">Customer</span>
                                <span>-</span>
                                <span style="padding: 10px;">Room Nr</span>

                            </h5>
                            <div id="test-list2">
                                <ul class="list" id="dispatchedOrdersList">

                                    @foreach($services->sortByDesc('updated_at') as $service)
                                        @if($service->status == 2)
                                            <li class="text-center">
                                                <label class="container">
                                                    <a href="{{ route( strtolower($service->serviceName) . '.show', $service->id) }}">
                                                        <span style="padding: 10px;">{{ $service->serviceName }}</span>
                                                        <span style="padding: 10px;">-</span>
                                                        <span style="padding: 10px;">{{ $service->guest->firstname }}</span>
                                                        <span style="padding: 10px;">-</span>
                                                        <span style="padding: 10px;">{{ $service->roomNumber }}</span>
                                                    </a>
                                                    <input type="checkbox"
                                                           name="{{ $service->serviceName .'/'.$service->id  }}"
                                                           @if ($service->status == '2') checked @endif><span
                                                            class="checkmark"></span>

                                                </label>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                                <ul class="pagination"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('scripts')
            <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
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

                var thirdList = new List('test-list3', {
                    valueNames: ['name'],
                    page: 5,
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
                        window.location = data.goToShow.toLowerCase().replace(' ', '');
                    };
                    toastr.success(data.message, 'New Order:');

                    var li = $('<li class="text-center">\n' +
                        '<label class="container">' +
                        '<a href="' + data.goToShow.toLowerCase() + '">\n' +
                        '<span style="padding: 10px;">' + data.serviceName + '</span>\n' +
                        '<span style="padding: 10px;">' + data.roomNumber + '</span>\n' +
                        '</a>\n' +
                        '<input type="checkbox"' + 'name="' + data.serviceName + '/' + data.orderId + '" checked >\n' +
                        '<span class="checkmark"></span>\n' +
                        '</label>' +
                        '</li>').hide();

                    $('#newOrdersList').append(li);
                    li.fadeIn('slow');

                });
            </script>
            <script>
                //ask for confirmation before changing/deleting orders from table
                $(document).ready(function () {
                    //toastr.success('Welcome Isabella!');

                    //Change status services:
                    $(document).on('change', 'input:checkbox', function (event) {
                        var $this = this;
                        var route = 'service/status' + event.target.name + '';
                        if ($($this).is(':checked')) {
                            var li = $($this).parents('li');

                            toastr.options = {'closeButton': false, 'timeOut': false, 'closeOnHover': false};
                            toastr.warning('<div><button type="button" id="cancelBtn" class="btn btn-primary">Cancel</button><button type="button" id="okBtn" class="btn" style="margin: 0 8px 0 8px">Ok</button></div>', 'Is it already completed?');

                            $('#okBtn').click(function (e) {
                                e.preventDefault();
                                $(li).hide().prependTo('#dispatchedOrdersList').fadeIn('slow');
                                $.get(route, function (response, status) {
                                    $this.checked = true;
                                    console.log("Completed " + response);
                                }).fail(function () {
                                    $(li).hide().appendTo('#pendingOrdersList').fadeIn('slow');
                                    toastr.options = {
                                        'closeButton': true,
                                        'timeOut': 5000,
                                        'closeOnHover': true,
                                        'progressBar': true
                                    };
                                    toastr.warning('Something went wrong', 'Alert!');
                                });
                            });

                            $('#cancelBtn, #toast-container').click(function (e) {
                                e.preventDefault();
                                $this.checked = false;
                            });

                        } else {
                            var li = $($this).parents('li');
                            $(li).hide().appendTo('#pendingOrdersList').fadeIn('slow');
                            $.get(route, function (response, status) {
                                console.log("In process " + response);
                            }).fail(function () {
                                $(li).hide().prependTo('#dispatchedOrdersList').fadeIn('slow');
                                $this.checked = true;
                                toastr.options = {
                                    'closeButton': true,
                                    'timeOut': 5000,
                                    'closeOnHover': true,
                                    'progressBar': true
                                };
                                toastr.warning('Something went wrong', 'Alert!');
                            });
                        }
                    });
                });
            </script>
@endsection