<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Edit Task</title>
</head>
<body>
    <div class="main-newtask-div">
        <p>Edit tasks</p>
        <form action="/edittask/{{$task->id}}" method="POST">
            @csrf
            @method('put')

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{$task->title}}">
            <br>

            <label for="description">Description</label>
            <textarea name="description" id="description">{{$task->description}}</textarea>
            <br>

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

            <br>
            <br>
            <button type="submit">Update Task</button>

            <br>
            <br>
        
                <a href="/homepage">Go Back</a>
        

        </form>
    </div>
</body>
</html>