<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Admin dash board</title>
</head>
<body>
    <div class="nav-wrapper">
        <nav class="navbar">
            <div class="sub-navbar">
                <a href="/admin/dashboard" class="dashboard-link">Dashboard</a>
            </div>
                    <form action="/logout" method="GET">
                        <button type="submit" class="logout">Log out</button>
                    </form>
                    
        </nav>
    </div>


        <div class="main-div">
            
            <div class="stat-wrapper">
                <p class="stat-title">Task Statistics</p>
            </div>
            <div>
                <p class="count-title">User and Status Count</p>
            </div>
            <div class="box-wrapper">

                <div class="box-1">
                    <h1>Total User</h1>
                    <p class="number">{{ $total}}</p>
                </div>

                <div class="box-1">
                    <h1>Total Tasks</h1>
                    <p class="number">{{ $total_tasks}}</p>
                </div>

                <div class="box-1">
                    <h1>Total Pending</h1>
                    <p class="number">{{ $total_pending}}</p>
                </div>

                <div class="box-1">
                    <h1>Total Completed</h1>
                    <p class="number">{{ $total_completed}}</p>
                </div>

                <div class="box-1">
                    <h1>Total Cancelled</h1>
                    <p class="number">{{ $total_cancelled}}</p>
                </div>
                
            </div>
            <div class="tasks-by-priority">
                <p class="count-title">Tasks Count by Priority</p>
                <div class="urgenttasks">
                    <div class="taskss-u">
                        <p>Urgent</p>    
                        <p> {{ $total_urgent}} </p>
                    </div>
                    <div class="taskss-h"> 
                        <P>High</P>
                        <p> {{ $total_high}} </p>
                    </div>

                    <div class="taskss-m"> 
                        <p>
                            Medium
                        </p>
                        <p> {{ $total_medium}} </p>
                    </div>
                    <div class="taskss-l"> 
                        <p>
                            Low
                        </p>
                        <p> {{ $total_low}} </p>
                    </div>
                </div>
            </div>
            <div style="margin: 4% 5%; border: 1px black solid; background-color: rgba(43,114,94,255); padding: 20px 700px; border-radius: 5px">
                    <a href="/newuser">Create new user</a>
            </div>

            <div>
                <div style="margin-left: 3%; margin-top:3%" >
                    
                    <table border="1" cellpadding="10" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><button class="edit-button">
                                    <a href="/edituser/{{$user->id}}" class="edit-link">Edit</a>
                                </button>
            
                                <form action="/deleteuser/{{$user->id}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-button">
                                        Delete
                                    </button>
                                </form>
                                </td> 
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                </div>
            </div>
        

</body>
</html>