<x-layout>
        <div class="main-div">
            
            <div class="stat-wrapper">
                <p class="stat-title">Task Statistics</p>
            </div>
            <div>
                <p class="count-title">Task Count</p>
            </div>
            <div class="box-wrapper">

                

                <div class="box-1">
                    <h1>Total Task</h1>
                    <p class="number">{{ $total}}</p>
                </div>

                <div class="box-1">
                    <h1>Pending</h1>
                    <p class="number">{{ $total_pending}}</p>
                </div>

                <div class="box-1">
                    <h1>Completed</h1>
                    <p class="number">{{ $total_completed}}</p>
                </div>

                <div class="box-1">
                    <h1>Cancelled</h1>
                    <p class="number">{{ $total_cancelled}}</p>
                </div>
                
            </div>
            <div class="tasks-by-priority">
                <p class="count-title">Tasks by Priority</p>
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
        
</x-layout>