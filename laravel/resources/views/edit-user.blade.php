<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Admin dash board</title>
</head>
<body>
    <div class="nav-wrapper">
        <nav class="navbar">
            <div class="sub-navbar">
                <a href="/admin/dashboard" class="dashboard-link">Dashboard</a>
            </div>
                    <form action="/logout" method="GET">
                        <button type="submit" class="logout">Log out</button>
                    </form>
                    
        </nav>
    </div>

    <div class="main-signup-div">
        <h2 class="login-title">Edit user</h2>
        <form action="/edituser/{{$user->id}}" method="POST">

        @csrf
        @method('put')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{$user->name}}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        <label for="email"> Email: </label>
        <input type="email" name="email" id="email" value="{{$user->email}}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        <label for="password"> Password: </label>
        <input type="password" name="password" id="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        <button type="submit">Update user </button>
        <a href="/admin/dashboard">Back</a>
    </form>
    </div>

</body>
</html>

