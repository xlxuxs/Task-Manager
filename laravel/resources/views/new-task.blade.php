<x-layout>
    <div class="main-newtask-div">
        <p>Create new task</p>
        <form action="/newtask" method="POST">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <br>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
            <br>
                @error('description') 
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            <label for="priority">Priority</label>
            <select name="priority">
                <option >Low</option>
                <option >Medium</option>
                <option >High</option>
                <option >Urgent</option>
            </select>
            <br>

            <label for="status">Status</label>
            <select name="status">
                <option >Pending </option>
                <option>Completed</option>
                <option >Cancelled</option>
            </select>
            <br>

            <label for="date">Due date</label>
            <input type="date" name="date" id="date">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <br>
            <br>
            <button type="submit">Create Task</button>

            <br>
            <br>
        
            <a href="/homepage">Go Back</a>
        

        </form>
    </div>

</x-layout>