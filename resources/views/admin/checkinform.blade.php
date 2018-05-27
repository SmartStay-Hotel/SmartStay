@extends('admin.layout')

@section('content')


    <h2 id="checkInTitle">CHECK-IN</h2>
    <form id="checkInForm" class="col-sm-4">
        <div class="form-group">
            <label for="Name">First name</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="Surname">Surname</label>
            <input type="text" class="form-control" id="surname" placeholder="Surname">
        </div>
        <div class="form-group">
            <label for="Id">Id</label>
            <input type="text" class="form-control" id="id" placeholder="Id">
        </div>
        <div class="form-group">
            <label for="PeopleNumber">Number of people</label>
            <input type="text" class="form-control" id="PeopleNumber" placeholder="Number of people">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Price">
        </div>

        <label for="bedroomType">Bedroom Type</label><br/>
        <select id="bedroomType">
            <option selected>Select the bedroom type</option>
            <option value="standard">Standard</option>
            <option value="view">Standard with view</option>
            <option value="superior">Superior</option>
            <option value="deluxe">Deluxe</option>
            <option value="family">Family</option>
        </select><br/><br/>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="jacuzzi">
            <label class="form-check-label" for="jacuzzi">Jacuzzi</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
