@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-sm-10" id="groupDashBtn">
            <a href="{{ url('admin/checkin') }}" id="checkInBtn" class="btn btn-success">Check in</a>
    <a href="{{ url('admin/checkout') }}" id="checkOutBtn" class="btn btn-danger">Check out</a>
    <a href="#" id="bookingsBtn" class="btn btn-info">Bookings</a>
    <a href="{{ route('guests.create') }}" id="newBookingBtn" class="btn btn-secondary">New Booking</a>
    </div>
    </div>

    <div class="row">
        <div class="col-sm-4" id="pendingOrdersCard">
            <div class="card text-center">
                <h5 class="card-header" id="pendingOrdersHeader">PENDING ORDERS</h5>
                <div class="card-body" id="pendingOrdersBody">
                    <h5 class="card-title">Orders ready to be dispatched</h5>
                    <ul class="card-text" id="dispatchedOrdersList">
                        <li><span>Alarm</span> - Happy Giraffe - <span>311</span><button style="float:right"><i style="display: block" class="fas fa-check"></i></button></li>
                        <li><span>Pet care</span> - Crazy Elephant - <span>209</span><button style="float:right"><i style="display: block" class="fas fa-check"></i></button></li>
                        <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span><button style="float:right"><i style="display: block" class="fas fa-check"></i></button></li>
                        <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span><button style="float:right"><i style="display: block;" class="fas fa-check"></i></button></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-4" id="dispatchedOrdersCard">
                <div class="card text-center">
                    <h5 class="card-header" id="dispatchedOrdersHeader">DISPATCHED ORDERS</h5>
                    <div class="card-body" id="dispatchedOrdersBody">
                        <h5 class="card-title">Dispatched orders</h5>
                        <ul class="card-text" id="dispatchedOrdersList">
                            <li><span>Alarm</span> - Happy Giraffe - <span>311</span><button style="float:right"><i class="fas fa-times"></i></button></li>
                            <li><span>Pet care</span> - Crazy Elephant - <span>209</span><button style="float:right"><i class="fas fa-times"></i></button></li>
                            <li><span>Restaurant</span> - Aggressive Hippo - <span>207</span><button style="float:right"><i class="fas fa-times"></i></button></li>
                            <li><span>Restaurant</span> - Lunatic Racoon - <span>105</span><button style="float:right"><i class="fas fa-times"></i></button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


@endsection
