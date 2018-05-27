@extends('layout')
 
@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
         <div class="pull-right">
            <a class="btn btn-success" href="{{ route('housekeeping.create') }}"> New Housekeeping Order</a>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Bed Sheets</th>
              <th scope="col">Cleaning</th>
              <th scope="col">Minibar</th>
              <th scope="col">Blanket</th>
              <th scope="col">Toiletries</th>
              <th scope="col">Pillow</th>
            </tr>
          </thead>
          <tbody>
            @foreach($housekeepings as $housekeeping)
            <tr>
              <th scope="row">{{$housekeeping->id}}</th>
                <td>{{$housekeeping->bed_sheets}}</td>
                <td>{{$housekeeping->cleaning}}</td>
                <td>{{$housekeeping->minibar}}</td>
                <td>{{$housekeeping->blanket}}</td>
                <td>{{$housekeeping->toiletries}}</td>
                <td>{{$housekeeping->pillow}}</td>
                <td>{{$housekeeping->price}}</td>
                <td>{{$housekeeping->bed_sheets}}</td>
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('/service/housekeeping/' . $housekeeping->id . '/edit') }}">
                   <button type="button" class="btn btn-warning">Edit</button>
                  </a>&nbsp;               
                <form action="{{url('/service/housekeeping', [$housekeeping->id])}}" method="POST">
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