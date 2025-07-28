<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Task</title>
</head>
<body>
    <p>create new task</p>
    <form action="/newtask" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <br>

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
        <br>

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

        <br>
        <br>
        <button type="submit">Create Task</button>

        <br>
        <br>
       <button>
            <a href="/homepage">Go Back</a>
       </button>

    </form>

</body>
</html>