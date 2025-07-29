<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Home</title>
</head>
<body>
    <div class="nav-wrapper">
        <nav class="navbar">
            <div class="sub-navbar">
                <a href="/homepage" class="home-link">Home</a>
                <a href="/dashboard" class="dashboard-link">Dashboard</a>
            </div>
                    <form action="/logout" method="GET">
                        <button type="submit" class="logout">Log out</button>
                    </form>
                    
        </nav>
    </div>

    {{$slot}}

</body>
</html>