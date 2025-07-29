<x-layout>
    <div class="main-newtask-div">
        <p>Edit tasks</p>
        <form action="/edittask/{{$task->id}}" method="POST">
            @csrf
            @method('put')

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{$task->title}}">
            <br>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="description">Description</label>
            <textarea name="description" id="description">{{$task->description}}</textarea>
            <br>
            @error('description') 
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="priority">Priority</label>
            <select name="priority">
                <option value="Low" {{ $task->priority === 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $task->priority === 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $task->priority === 'High' ? 'selected' : '' }}>High</option>
                <option value="Urgent" {{ $task->priority === 'Urgent' ? 'selected' : '' }}>Urgent</option>
            </select>
            <br>

            <label for="status">Status</label>
            <select name="status">
                <option value="pending" {{$task->status === 'pending' ? 'selected' : ''}}>Pending </option>
                <option value="completed" {{$task->status === 'completed' ? 'selected' : ''}}>Completed</option>
                <option value="cancelled" {{$task->status === 'cancelled' ? 'selected' : ''}}>Cancelled</option>
            </select>
            <br>

            <label for="date">Due date</label>
            <input type="date" name="date" id="date" value="{{$task->date->format('Y-m-d')}}">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <br>
            <br>
            <button type="submit">Update Task</button>

            <br>
            <br>
        
                <a href="/homepage">Go Back</a>
        

        </form>
    </div>

</x-layout>