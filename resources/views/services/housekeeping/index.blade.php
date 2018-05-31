@extends('layouts.app')

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
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($housekeepings as $housekeeping)
            <tr>
                <th><a href="/service/housekeeping/{{$housekeeping->id}}">{{$housekeeping->id}}</a></th>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets" name="bed_sheets"
                           {{ ($housekeeping->bed_sheets) ? 'checked' : "" }} onclick="return false;"/></td>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets" name="bed_sheets"
                           {{ ($housekeeping->cleaning) ? 'checked' : "" }} onclick="return false;"/></td>
                </td>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets" name="bed_sheets"
                           {{ ($housekeeping->minibar) ? 'checked' : "" }} onclick="return false;"/></td>
                </td>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets" name="bed_sheets"
                           {{ ($housekeeping->blanket) ? 'checked' : "" }} onclick="return false;"/></td>
                </td>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets" name="bed_sheets"
                           {{ ($housekeeping->toiletries) ? 'checked' : "" }} onclick="return false;"/></td>
                </td>
                <td>
                    <input type="checkbox" class="form-control" id="bed_sheets" name="bed_sheets"
                           {{ ($housekeeping->pillow) ? 'checked' : "" }} onclick="return false;"/></td>
                </td>
                <td>{{$housekeeping->price}}</td>
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