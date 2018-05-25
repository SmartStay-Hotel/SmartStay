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
                                    <a class="nav-link disabled" href="">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('cv.create')}}">Create New CV</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="w3-container">
                                <h2>CV List</h2>
                                <p>Manage your employee's CV</p>
                                <ul class="w3-ul w3-card-4">
                                    @foreach($employees as $employee)
                                        <li class="w3-bar">
                                            <div class="w3-bar-item w3-button w3-white w3-xlarge w3-right">
                                                {!! Form::open(['method' => 'DELETE','route' => ['cv.destroy', $employee->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('', ['class' => 'w3-bar-item w3-button w3-transparent w3-xlarge w3-right', 'style'=>'background-image:url(img/delete-icon-32.png); background-repeat: no-repeat;']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            <span class="w3-bar-item w3-button w3-white w3-xlarge w3-right">
                                        <a href="{{route('cv.edit', $employee->id)}}"><img src="img/edit-icon-32.png"
                                                                                           alt="edit"></a>
                                    </span>
                                            <span class="w3-bar-item w3-button w3-white w3-xlarge w3-right">
                                        <a href="{{route('cv.show', $employee->id)}}"><img src="img/show-icon-32.png"
                                                                                           alt="show"></a>
                                    </span>
                                            <img src="./avatars/{{$employee->avatar}}"
                                                 class="w3-bar-item w3-circle w3-hide-small"
                                                 style="width:85px">
                                            <div class="w3-bar-item">
                                                <span class="w3-large">{{$employee->name ." ". $employee->lastname}}</span><br>
                                                <span>{{$employee->position}}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <h4>You don't have admin role</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
