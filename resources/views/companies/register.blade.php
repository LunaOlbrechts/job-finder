@extends('layouts/app')

@section('content')

    <form class="container" method="post">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Company Name</label>
                <input type="text" name="name" class="form-control" id="inputName">
                <label for="inputName">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Location</label>
            <input type="text" name="location" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>

        <div class="form-group">
            <label for="inputAddress">Bio</label>
            <input type="text" name="bio" class="form-control" id="inputBio" placeholder="Our company is the best">
        </div>

        <div class="form-group">
            <label for="inputAddress">Phone number</label>
            <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="0479952932">
        </div>

        <div class="form-group">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>

@endsection