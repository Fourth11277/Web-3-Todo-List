<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    <h2>Add New Task</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Task Name:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description (Optional):</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>

    <h2>Tasks</h2>
    @if($tasks->count() > 0)
        <ul>
            @foreach($tasks as $task)
                <li>
                    <strong>{{ $task->title }}</strong>
                    @if($task->description)
                        <p>{{ $task->description }}</p>
                    @endif
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No tasks yet. Add your first task above!</p>
    @endif
</body>
</html>
