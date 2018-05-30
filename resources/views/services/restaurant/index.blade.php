@extends('admin.layout')

@section('css')
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-sm-9 table-responsive" id="alarmTableContainer">

        <table class="table table-sm table-hover text-center" id="alarmTable">
            <thead id="alarmTableHeader">
            <tr><h2 id="alarmTitle"><i class="fas fa-utensils fa-xs" style="padding: 5px;"></i>Restaurant<a href="#"><i
                                id="addGuest" class="fas fa-user-plus fa-xs"
                                style="padding-left: 70%; color: white; z-index: 1;"></i></a></h2></tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Guest Name</th>
                <th scope="col">Room Nº</th>
                <th scope="col">Day and Time</th>
                <th scope="col">People Nº</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($restaurants as $restaurant)
                <tr>
                    <th><a href="/service/restaurant/{{$restaurant->id}}">{{$restaurant->id}}</a></th>
                    <td> {{ $restaurant->quantity }} </td>
                    <td>{{$restaurant->day_hour}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('/service/restaurant/' . $restaurant->id . '/edit') }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('/service/restaurant', [$restaurant->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                        </div>
                    </td>



                    <td>
                        <button class="alarmAddBtn"><i class="far fa-eye"></i></button>
                    </td>
                    <td>
                        <button class="alarmEditBtn"><i class="fas fa-edit"></i></button>
                    </td>
                    <td>
                        <button class="alarmDeleteBtn"><i class="fas fa-times"></i></button>
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
@endsection