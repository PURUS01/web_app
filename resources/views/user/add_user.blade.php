@extends('user.dashboard')
@section('title','AddUser')
@section('content')

<div class="container mt-3">
    <h1 class="text-primary text-center">Add User</h1>
<div class="row mx-5">

    <form action="{{route('create_user')}}" method="post">
        @csrf
        <div class="col-3 mb-2">
            <div class="form-group">
                <label for="Business name">Business Name</label>
                <input type="text" class="form-control" name="business_name" aria-describedby="emailHelp" placeholder="Enter Business Name">

            </div>
        </div>

        <div class="col-4 mb-2">
            <div class="form-group">
                <label for="Admin name">User Name</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Name">

            </div>
        </div>
        <div class="col-4 mb-2">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

            </div>
        </div>
        <div class="col-4 mb-4">
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
        </div>

        <div class="col-4 mb-2">
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>

    </form>
</div>
</div>
@endsection
