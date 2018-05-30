@extends('admin.layout')
@section('content')


<h2 id="manageGuestsTitle">MANAGE BOOKINGS<a href="{{ url('admin/bookings') }}"><i id="addGuestManage" class="fas fa-user-plus" style="padding-left: 65%; color: white;"></i></a></h2>

<div class="col-sm-8" id="guestsTable" >
    <table class="table table-bordered table-hover text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Id</th>
            <th>E-mail</th>
            <th>Telephone</th>
            <th colspan="3">Balance</th>
        </tr>
        {{ csrf_field() }}
        </thead>
        <tbody>
        @foreach($guests as $indexKey => $guest)
            <tr class="item{{$guest->id}} @if($guest->balance > 0) warning @endif">
                <td class="col1">{{ $indexKey+1 }}</td>
                <td>{{$guest->firstname}}</td>
                <td>{{$guest->lastname}}</td>
                <td>{{$guest->nie}}</td>
                <td>{{$guest->email}}</td>
                <td>{{$guest->telephone}}</td>
                <td><button class="alarmAddBtn"><i class="far fa-eye"></i></button></td>
                <td><button class="alarmEditBtn"><i class="fas fa-edit"></i></button></td>
                <td><button class="alarmDeleteBtn"><i class="fas fa-times"></i></button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection