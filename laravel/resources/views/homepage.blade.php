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
    <p>welcome to the home page {{auth()->user()->name}}</p>

    <div class="nav">

    <form action="/homepage" method="GET">
        @csrf 
        <button>
            <a href="/newtask">
                New Task
            </a>
        </button>

    </form>

    <form action="/logout" method="GET">
        <button type="submit">Log out</button>
    </form>

    </div>

    <div style="background-color: gray; margin-top:50px;  ">
        <p class="task-title">Tasks</p>
        @foreach ($tasks as $task)
           <div class="sub-div">

                <span class="title"> 
                    {{$task['title']}} 
                </span>       
                <p class="time">
                    Created at {{$task->created_at->format('d-m-Y')}}
                </p>
                <p class="dis">
                    {{$task['description']}} 
                </p>

                <div style="display:flex;">
                    <p class="button"> {{$task['priority']}} </p>
                    <p class="button"> {{$task['status']}} </p>
                    <p class="button">{{$task->date->format('d-m-Y')}}</p>
                </div>

                <button>
                    <a href="/edittask/{{$task->id}}">Edit</a>
                </button>

                <form action="/deletetask/{{$task->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>
                        Delete
                    </button>
                </form>
            </div>           

        @endforeach

    </div>

</body>
</html>