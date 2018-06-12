@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('petcare.index') }}">Pet Care</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Reservation</li>
@endsection
@section('css')
    <style>
        fieldset {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
        }
    </style>
@endsection

@section('content')

    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <table class="table table-sm table-hover text-center" id="serviceTable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <thead id="serviceTableHeader">
                <tr><h2 id="serviceTitle"><i class="fas fa-paw fa-xs" style="padding: 5px;"></i>Pet Care<a
                                href="{{ route('petcare.index') }}"><i
                                    id="addGuest" class="fas fa-user-plus fa-xs"
                                    style="padding-left: 70%; color: white; z-index: 1;"></i></a></h2>
                </tr>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </table>
        {!! Form::open(['route' => 'petcare.store', null, 'method'=>'POST']) !!}
        @include('services.petcare.partial.form')
        {!! Form::close() !!}
    </div>
@endsection
{{--
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('petcare.index') }}"> Back</a>
    </div>
    <h1>Add New Pet Care order</h1>
    <hr>
     <form action="/service/petcare" method="post">
     {{ csrf_field() }}
      <div class="form-group">
          <label for="guest">Guest: </label>
          <select name="guest">
              @foreach ($guests as $guest)
                  <option value="{{ $guest->id }}">{{ $guest->firstname." ".$guest->lastname}}</option>
              @endforeach
          </select><br/>
      </div>

          <label for="title">Water: </label>
          <input type="checkbox" class="form-control" id="water"  name="water"/>
          <label for="title">Snacks: </label>
          <input type="checkbox" class="form-control" id="snacks"  name="snacks"/>
          <label class="radio-inline"><input type="radio" name="food[]">Standard Food</label>
          <label class="radio-inline"><input type="radio" name="food[]">Premium Food</label>
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
    --}}