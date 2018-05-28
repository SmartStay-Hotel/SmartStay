@extends('admin.layout')

@section('content')


    <h2 id="checkInTitle">CHECK-IN</h2>

    <form id="checkInForm" class="col-sm-6">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Name">First name</label>
                <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
                <label for="Surname">Surname</label>
                <input type="text" class="form-control" id="surname" placeholder="Surname">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="Id">Id</label>
            <input type="text" class="form-control" id="id" placeholder="Id">
        </div>
        <div class="form-group col-md-8">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Email">
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="PeopleNumber">Nr people</label>
                <input type="number" class="form-control" id="PeopleNumber" placeholder="Number of people">
            </div>
            <div class="form-group col-md-4">
                <label for="price">Price per Night</label>
                <input type="number" class="form-control" id="price" placeholder="Price">
            </div>
            <div class="form-group col-md-6">
                <label for="price">Bedroom Type</label>
                <select id="bedroomType" class="form-control">
                    <option selected>Select the bedroom type</option>
                    <option value="standard">Standard</option>
                    <option value="view">Standard with view</option>
                    <option value="superior">Superior</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="family">Family</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="jacuzzi">
                <label class="form-check-label" for="jacuzzi">
                    Jacuzzi
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Check in</button>
    </form>

@endsection
