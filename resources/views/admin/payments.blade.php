@extends('admin.layout')

@section('content')

    <h2 id="checkInTitle">PAYMENTS</h2>
    <div class="col-sm-6">
    <table id="paymentsTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Room Type</th>
            <th scope="col">Check-in Day</th>
            <th scope="col">Check-out Day</th>
            <th scope="col">Room Nr</th>
            <th scope="col">Price for Orders</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Happy Giraffe</th>
            <td>Deluxe</td>
            <td>2018-03-01</td>
            <td>2018-03-04</td>
            <td>211</td>
            <td>50</td>
        </tr>
        <tr>
            <th scope="row">Crazy Elephant</th>
            <td>Standard</td>
            <td>2018-04-18</td>
            <td>2018-04-09</td>
            <td>400</td>
            <td>20</td>
        </tr>
        <tr>
            <th scope="row">Aggressive Hippo</th>
            <td>Standard</td>
            <td>2018-04-15</td>
            <td>2018-04-20</td>
            <td>102</td>
            <td>70</td>
        </tr>
        <tr>
            <th scope="row">Lunatic Racoon</th>
            <td>Deluxe</td>
            <td>2018-04-15</td>
            <td>2018-04-16</td>
            <td>407</td>
            <td>0</td>
        </tr>
        </tbody>
    </table>
    </div>

@endsection