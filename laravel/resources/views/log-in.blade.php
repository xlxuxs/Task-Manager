<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>loign</title>
</head>
<body>
    <form action="/login" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <button type="submit">Log in</button>
        <button><a href="/">Back</a></button>
        @error('error')
              <div style="color: red;">{{ $message }}</div>
        @enderror
    </form>
</body>
</html>