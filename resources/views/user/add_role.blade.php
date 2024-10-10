@extends('user.dashboard')
@section('title','AddRole')
@section('content')


    <div class="container">
        <form action="{{route('new_role')}}" method="post">
            @csrf
        <div class="row mb-3">
            <div class="col-4">

                    <div class="form-group">
                        <label for="Role Type">Role Type</label>
                        <input type="text" class="form-control" name="role_name" aria-describedby="emailHelp" placeholder="Enter Role Type">

                    </div>


            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
        </form>
    </div>
@endsection
