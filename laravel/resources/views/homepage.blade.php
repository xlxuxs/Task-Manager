<x-layout>

    <div class="filter-and-newtask">
            
        <div class="sub-filter">
            <span class="filter-text">Filter:</span>

            <form action="/filter" method="GET">
                @csrf
                
                <select name="filter_status" class="filter">
                    <option value="all" >All</option>
                    <option value="completed" >Completed</option>
                    <option value="pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>

                <select name="filter_priority" class="filter">
                    <option value="all" >All</option>
                    <option value="urgent" >Urgent</option>
                    <option value="high">High</option>
                    <option value="medium" >Medium</option>
                    <option value="low" >Low</option>
                </select>
                <button type="submit" class="filter-button">Filter</button>
            </form>
        </div>
        <div class="sub-header">

            <form action="/homepage" method="GET">
                @csrf 
                
                    <a href="/newtask" class="newtask">
                        New Task
                    </a>

            </form>
        </div>
    </div>

    <div class="main-div">
        <div class="div-title">
            <span class="task-title">Task Management <br> </span>
            <span>Create edit and delete your tasks</span>
        </div>

        @foreach ($tasks as $task)
            <hr>
               
           <div class="sub-div">

            <div class="content-head">

                <span class="title"> 
                    {{$task['title']}} 
                </span> 
                <div class="button-div">
                    <button class="edit-button">
                        <a href="/edittask/{{$task->id}}" class="edit-link">Edit</a>
                    </button>

                    <form action="/deletetask/{{$task->id}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="delete-button">
                            Delete
                        </button>
                    </form>
                </div>
           </div>
     
                <span class="time">
                    Created at {{$task->created_at->format('d-m-Y')}}
                </span>
                <p class="dis">
                    {{$task['description']}} 
                </p>

                <div style="display:flex;">
                    <p class="button"> {{$task['priority']}} </p>
                    <p class="button"> {{$task['status']}} </p>
                    <p class="button">{{$task->date->format('d-m-Y')}}</p>
                </div>
                
            </div>           

        @endforeach

    </div>

</x-layout>