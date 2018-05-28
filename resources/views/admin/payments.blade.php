@extends('admin.layout')

@section('content')

    <h2 id="checkOutTitle">CHECK OUT</h2>
    <div class="col-sm-6" id="paymentsTable" >
    <table class="table table-bordered table-hover text-center">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Room Type</th>
            <th scope="col">Check-in Day</th>
            <th scope="col">Check-out Day</th>
            <th scope="col">Room Nr</th>
            <th scope="col">Price for Orders</th>
            <th scope="col">Check out</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Happy Giraffe</td>
            <td>Deluxe</td>
            <td>2018-03-01</td>
            <td>2018-03-04</td>
            <td>211</td>
            <th scope="row">50</th>
            <td><button id="exitBtn"><i class="fas fa-sign-out-alt fa-lg"></i></button></td>
        </tr>
        <tr>
            <td>Crazy Elephant</td>
            <td>Standard</td>
            <td>2018-04-18</td>
            <td>2018-04-09</td>
            <td>400</td>
            <th scope="row">20</th>
            <td><button id="exitBtn"><i class="fas fa-sign-out-alt fa-lg"></i></button></td>
        </tr>
        <tr>
            <td>Aggressive Hippo</td>
            <td>Standard</td>
            <td>2018-04-15</td>
            <td>2018-04-20</td>
            <td>102</td>
            <th scope="row">70</th>
            <td><button id="exitBtn"><i class="fas fa-sign-out-alt fa-lg"></i></button></td>
        </tr>
        <tr>
            <td>Lunatic Racoon</td>
            <td>Deluxe</td>
            <td>2018-04-15</td>
            <td>2018-04-16</td>
            <td>407</td>
            <th scope="row">0</th>
            <td><button id="exitBtn"><i class="fas fa-sign-out-alt fa-lg"></i></button></td>
        </tr>
        </tbody>
    </table>
    </div>


@endsection