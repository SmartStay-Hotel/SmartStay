@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Auth::user()->name == "Admin")
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cv.index')}}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="">Edit {{$employee->name ." " . $employee->lastname}}'s CV</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="w3-container">
                            <h2>CV Form</h2>
                            <p>Fill the form to edit the CV.</p>
                            <br/>
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
                            {!! Form::model($employee, ['method' => 'PATCH','route' => ['cv.update', $employee->id], 'files' => true,]) !!}
                            @include('cv.partial.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                @else
                    <h4>You don't have admin permission</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
