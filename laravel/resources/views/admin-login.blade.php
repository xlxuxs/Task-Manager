<x-layout2>
    <div class="main-login-div">
        
        <h1 class="login-title">Log in</h1>

        <form action="/admin/login" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            @error('error')
                <div style="color: red; margin-left:10%;">{{ $message }}</div>
            @enderror
            <button type="submit">Log in</button>
            <a href="/">Back</a>

            
            

        </form>
</x-layout2>