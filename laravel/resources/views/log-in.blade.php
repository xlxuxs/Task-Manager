<x-layout2>
    <div class="main-login-div">
        @error('error')
                <div style="color: red; margin-left:10%;">{{ $message }}</div>
            @enderror
        <h1 class="login-title">Log in</h1>

        <form action="/login" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <button type="submit">Log in</button>
            <a href="/">Back</a>

            

        </form>
</x-layout2>