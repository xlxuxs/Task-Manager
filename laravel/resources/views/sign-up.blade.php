<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Task Manager</title>
</head>
<body>
    
    <div class="main-login-div">
    <form action="/signup" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="email"> Email: </label>
        <input type="email" name="email" id="email">
        <label for="password"> Password: </label>
        <input type="password" name="password" id="password">
        <button type="submit">Sign Up</button>
        <a href="/">Back</a>
    </form>
    </div>
</body>
</html>