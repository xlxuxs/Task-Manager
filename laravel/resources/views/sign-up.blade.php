<x-layout2>

    <div class="main-signup-div">
        <h2 class="login-title">Sign up</h2>
    <form action="/signup" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        <label for="email"> Email: </label>
        <input type="email" name="email" id="email">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        <label for="password"> Password: </label>
        <input type="password" name="password" id="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        <button type="submit">Sign Up</button>
        <a href="/">Back</a>
    </form>
    </div>

</x-layout2>