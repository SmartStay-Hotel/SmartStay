@extends('admin.layout')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Trips</li>
@endsection
@section('content')

    <h2 id="serviceTitle"><i class="fas fa-suitcase" style="padding: 5px;"></i>Trips<a href="#"><i id="addGuest" class="fas fa-user-plus"></i></a></h2>
        <table class="table table-sm table-hover text-center" id="serviceTable">
            <thead id="serviceTableHeader">
            <tr>
                <th scope="col">Guest Id</th>
                <th scope="col">Bedroom Nr</th>
                <th scope="col">Day and Time</th>
                <th scope="col">Location</th>
                <th scope="col" colspan="3">Operations</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>311</td>
                <td>2018-05-29 7:00:00</td>
                <td>Niagara Falls</td>
                <td><button class="serviceAddBtn"><i class="far fa-eye"></i></button></td>
                <td><button class="serviceEditBtn"><a href="{{ url('services/trip/edit') }}"><i class="fas fa-edit"></i></a></button></td>
                <td><button class="serviceDeleteBtn"><i class="fas fa-times"></i></button></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>209</td>
                <td>2018-05-29 7:00:00</td>
                <td>Niagara Falls</td>
                <td><button class="serviceAddBtn"><i class="far fa-eye"></i></button></td>
                <td><button class="serviceEditBtn"><i class="fas fa-edit"></i></button></td>
                <td><button class="serviceDeleteBtn"><i class="fas fa-times"></i></button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>207</td>
                <td>2018-05-30 5:00:00</td>
                <td>Nairobi Desert</td>
                <td><button class="serviceAddBtn"><i class="far fa-eye"></i></button></td>
                <td><button class="serviceEditBtn"><i class="fas fa-edit"></i></button></td>
                <td><button class="serviceDeleteBtn"><i class="fas fa-times"></i></button></td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>305</td>
                <td>2018-05-29 9:00:00</td>
                <td>Uluru</td>
                <td><button class="serviceAddBtn"><i class="far fa-eye"></i></button></td>
                <td><button class="serviceEditBtn"><i class="fas fa-edit"></i></button></td>
                <td><button class="serviceDeleteBtn"><i class="fas fa-times"></i></button></td>
            </tr>
            </tbody>
        </table>


@endsection