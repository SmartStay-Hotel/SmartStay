@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Pet care</li>
@endsection
@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
         <div class="pull-right">
            <a class="btn btn-success" href="{{ route('petcare.create') }}"> New Pet Care Order</a>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Water</th>
              <th scope="col">Standard food</th>
              <th scope="col">Premium_food</th>
              <th scope="col">Snacks</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach($petcares as $petcare)
            <tr>
              <th><a href="/service/petcare/{{$petcare->id}}">{{$petcare->id}}</a></th>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets"  name="bed_sheets"
                            {{ ($petcare->water) ? 'checked' : "" }} onclick="return false;"/></td>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets"  name="bed_sheets"
                           {{ ($petcare->standard_food) ? 'checked' : "" }} onclick="return false;"/></td></td>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets"  name="bed_sheets"
                           {{ ($petcare->premium_food) ? 'checked' : "" }} onclick="return false;"/></td></td>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets"  name="bed_sheets"
                           {{ ($petcare->snacks) ? 'checked' : "" }} onclick="return false;"/></td></td>

                <td>{{ ($petcare->price) }} </td>
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('/service/petcare/' . $petcare->id . '/edit') }}">
                   <button type="button" class="btn btn-warning">Edit</button>
                  </a>&nbsp;               
                <form action="{{url('/service/petcare', [$petcare->id])}}" method="POST">
                     <input type="hidden" name="_method" value="DELETE">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
              </div>
 </td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endsection