<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            border: 1px solid white;
            border-radius: 15px;
            margin-bottom: 5px;
            text-align: center;
        }

        .sidenav .active{
            color: royalblue;
            background: white;
        }

        .sidenav a:hover {
            color: lightblue;
        }

        .main {

            margin-left: 200px;
            font-size: 18px; /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<title>@yield('title','Dashboard')</title>
</head>
<body>

<div class="sidenav">
    <h2 class="text-primary mb-4 text-center">Super Admin Panel</h2>
    <a href="{{route('dashboard')}}" class="{{ Request::is('user/dashboard') ? 'active' : ''}}"><i class="bi bi-card-checklist"></i>List</a>
    <a href="{{route('add_user')}}" class="{{ Request::is('user/add_user') ? 'active' : ''}}"><i class="bi bi-plus-circle"></i>Add Item</a>
    <a href="{{route('add_role')}}" class="{{ Request::is('user/add_role') ? 'active' : ''}}"><i class="bi bi-person-plus"></i>Add Role</a>

</div>

<div class="main">
    <nav class="navbar navbar-light bg-light d-flex">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <p class="text-dark h5">{{$user->name}}</p>

    </nav>
    @section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
        <table class="table"  id="myTable">
        <thead>
        <tr>

            <th scope="col">Business Name</th>
            <th scope="col">Admin Name</th>

        </tr>
        </thead>

    </table>
        </div>
    </div>
</div>

    @show
</div>

</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            processing:true,
            serverSide: true,
            ajax:'{!! route('dataTable') !!}',
            columns:[

                {data:'business_name',name:'business_name'},
                {data:'name',name:'name'}
            ]
        });
    });
</script>

</html>

