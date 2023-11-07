<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="panel">
        <div class="left">
            <a href="{{route('user.home')}}"><button class="btn btn-primary mt-2 float-right">Home</button></a>
        </div>
        <div class="right">
            <a href="{{route('user.search.index')}}"><button class="btn btn-primary mt-2 float-right">Search</button></a>
            <a href="{{route('login.logout')}}"><button class="btn btn-primary mt-2 float-right">Logout</button></a>
        </div>
    
    </div>
    

@yield('content')

<style>
    .panel{
        display: flex;
        justify-content: space-between;
        margin: 10px 90px;
    }
    .logout .btn{
        margin-right: 20px;
    }
</style>
</body>
</html>
